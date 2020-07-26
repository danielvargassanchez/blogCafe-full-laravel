<?php

namespace App\Http\Controllers\Admin;

use App\Nosotros;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NosotrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nosotros=Nosotros::all(); 
        if($nosotros->isEmpty()){
            $habilitado="si";
        }else{
            $habilitado="no";
        }
        return view('admin.nosotros.index',compact('nosotros','habilitado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nosotros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'informacion' => 'required',
            'imgNosotros' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $imagen=$request->file('imgNosotros');
        $slug="nosotros";
        if(isset($imagen)){
            $currentDate= Carbon::now()->toDateString();
            $nombre=$slug.'-'.$currentDate.'-'.uniqid().'.'.
            $imagen->getClientOriginalExtension();
            if(!file_exists('uploads/nosotros')){
                mkdir('uploads/nosotros',0777,true);
            }
            $imagen->move('uploads/nosotros',$nombre);
        }else{
            $nombre='default.png';
        }

        $nosotros= new Nosotros();
        $nosotros->informacion=$request->informacion;
        $nosotros->imgNosotros=$nombre;

        $nosotros->save();
        return redirect()->route('nosotros.index')->with('successMsg','Información agregada correctamente');
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
        $nosotros=Nosotros::find($id);
        return view('admin.nosotros.edit', compact('nosotros'));
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
        $this->validate($request,[
            'informacion' => 'required',
            'imgNosotros' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $imagen=$request->file('imgNosotros');
        $slug="nosotros";
        $nosotros=Nosotros::find($id);

        if(isset($imagen)){
            $currentDate= Carbon::now()->toDateString();
            $nombre=$slug.'-'.$currentDate.'-'.uniqid().'.'.
            $imagen->getClientOriginalExtension();
            if(!file_exists('uploads/nosotros')){
                mkdir('uploads/nosotros',0777,true);
            }
            $imagen->move('uploads/nosotros',$nombre);
        }else{
            $nombre=$nosotros->imgNosotros;
        }

        $nosotros->informacion=$request->informacion;
        $nosotros->imgNosotros=$nombre;

        $nosotros->save();
        return redirect()->route('nosotros.index')->with('successMsg','Información modificada correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nosotros= Nosotros::find($id);
        if(file_exists('uploads/nosotros/'.$nosotros->imgNosotros))
        {
            unlink('uploads/nosotros/'.$nosotros->imgNosotros);
        }
        $nosotros->delete();
        return redirect()->back()->with('successMsg','Información eliminada correctamente');
    }
}
