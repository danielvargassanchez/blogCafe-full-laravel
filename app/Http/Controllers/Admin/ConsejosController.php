<?php

namespace App\Http\Controllers\Admin;

use App\Consejos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsejosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consejos=Consejos::all();
        return view('admin.consejos.index',compact('consejos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.consejos.create');
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
            'titulo' => 'required',
            'texto' => 'required',
            'imgConsejo' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $imagen=$request->file('imgConsejo');
        $slug=str_slug($request->titulo);
        if(isset($imagen)){
            $currentDate= Carbon::now()->toDateString();
            $nombre=$slug.'-'.$currentDate.'-'.uniqid().'.'.
            $imagen->getClientOriginalExtension();
            if(!file_exists('uploads/consejos')){
                mkdir('uploads/consejos',0777,true);
            }
            $imagen->move('uploads/consejos',$nombre);
        }else{
            $nombre='default.png';
        }

        $consejo= new Consejos();
        $consejo->titulo=$request->titulo;
        $consejo->texto=$request->texto;
        $consejo->imgConsejo=$nombre;

        $consejo->save();
        return redirect()->route('consejos.index')->with('successMsg','Consejo agregado correctamente');
        
        
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
        $consejo=Consejos::find($id);
        return view('admin.consejos.edit', compact('consejo'));

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
            'titulo' => 'required',
            'texto' => 'required',
            'imgConsejo' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $imagen=$request->file('imgConsejo');
        $slug=str_slug($request->titulo);
        $consejo=Consejos::find($id);

        if(isset($imagen)){
            $currentDate= Carbon::now()->toDateString();
            $nombre=$slug.'-'.$currentDate.'-'.uniqid().'.'.
            $imagen->getClientOriginalExtension();
            if(!file_exists('uploads/consejos')){
                mkdir('uploads/consejos',0777,true);
            }
            $imagen->move('uploads/consejos',$nombre);
        }else{
            $nombre=$consejo->imgConsejo;
        }

        $consejo->titulo=$request->titulo;
        $consejo->texto=$request->texto;
        $consejo->imgConsejo=$nombre;

        $consejo->save();
        return redirect()->route('consejos.index')->with('successMsg','Consejo modificado correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consejo= Consejos::find($id);
        if(file_exists('uploads/consejos/'.$consejo->imgConsejo))
        {
            unlink('uploads/consejos/'.$consejo->imgConsejo);
        }
        $consejo->delete();
        return redirect()->back()->with('successMsg','Consejo eliminado correctamente');
    }
}
