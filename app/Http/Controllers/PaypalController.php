<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
 
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class PaypalController extends BaseController
{
	private $_api_context;

	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment()
	{
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$items = array();
		$subtotal = 0;
		$titulo=session('titulo');
		$precio=session('precio');
		$currency = 'MXN';

			$item = new Item();
			$item->setName($titulo)
			->setCurrency($currency)
			->setDescription($titulo)
			->setQuantity(1)
			->setPrice($precio);

			$items[] = $item;
			$subtotal += 1 * $precio;
	

		$item_list = new ItemList();
		$item_list->setItems($items);

		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0);

		$total = $subtotal;

		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription($titulo);

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('cursos'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		session(['paypal_payment_id'=> $payment->getId()]);

		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}

		return \Redirect::route('home')
			->with('message', 'Ups! Error desconocido.');
	}

	public function getPaymentStatus(Request $request)
	{
		// Get the payment ID before session clear
		$payment_id = session('paypal_payment_id');
		
		// clear the session payment ID
		\Session::forget('paypal_payment_id');

		$payerId = $request->input('PayerID');
		$token = $request->input('token');
	
		
		if (empty($payerId) || empty($token)) {
			return view('home')->with('message','Hubo un problema al 
			intentar pagar con Paypal');
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		$execution = new PaymentExecution();
		$execution->setPayerId($request->input('PayerID'));

		$result = $payment->execute($execution, $this->_api_context);


		if ($result->getState() == 'approved') {

			session(['paypal_payment_id' => $payment_id]);
			return \Redirect::route('datos.create')
				->with('message', 'Compra realizada de forma correcta, llene su información para envío del boleto');
		}
		return \Redirect::route('cursos')
			->with('cancel', 'Error en la compra');
	}
}