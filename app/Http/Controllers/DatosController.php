<?php

namespace App\Http\Controllers;

use App\Cursos;
use Mail;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.boleto.datos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $correo = $request->input('email');
        $nombre = $request->input('nombre');
        $id = session('idCurso');
        $curso = Cursos::find($id);
        $codigo = session('paypal_payment_id');

        $data = array(
            'correo' => $correo,
            'nombre' => $nombre,
            'codigo' => $codigo,
            'titulo' => $curso->titulo,
            'precio' => $curso->precio
        );

        
        $curso->cupo=$curso->cupo-1;
        $curso->save();

        $curso2=Cursos::find($curso->id);

        $curso2->registros()->create([
            'nombre'=> $nombre,
            'correo'=> $correo,
            'codigo'=> $codigo,
            'cursos_id'=> $curso->id
        ]);

        Mail::send('users.boleto.boleto', $data, function ($message) use ($correo) {
            $message->from('admin@blogCafe.com', 'blogCafe');
            $message->to($correo)->subject('Boleto al curso en blogCafé');
        });

        return \Redirect::route('cursos')->with('message','Revise su correo para descargar boleto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
