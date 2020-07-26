<?php

namespace App\Http\Controllers\Admin;

use App\Contacto;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos=Contacto::all();
        return view('admin.contacto.index',compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $contacto=Contacto::find($id);
        return view('admin.contacto.edit',compact('contacto'));
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
        $contacto=Contacto::find($id);
        $contacto->respondido="respondido";
        $correo=$request->input('email');
        $data=([
            'respuesta'=>$request->input('respuesta'),
        ]);


        Mail::send('users.boleto.mensaje', $data, function ($message) use ($correo) {
            $message->from('admin@blogCafe.com', 'blogCafe');
            $message->to($correo)->subject('Respuesta de BlogCafé');
        });

        $contacto->save();
        return redirect()->route('contacto.index')->with('successMsg','Se envío el mensaje correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacto= Contacto::find($id);
     
        $contacto->delete();
        return redirect()->back()->with('successMsg','Mensaje eliminado correctamente');
    }
}
