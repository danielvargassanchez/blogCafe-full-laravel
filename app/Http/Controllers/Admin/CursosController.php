<?php

namespace App\Http\Controllers\Admin;

use App\Cursos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos=Cursos::all();
        return view('admin.cursos.index',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cursos.create');
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
            'fecha' => 'required',
            'cupo' => 'required',
            'precio' => 'required',
            'informacion' => 'required',
            'imgCurso' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        $imagen=$request->file('imgCurso');
        $slug=str_slug($request->titulo);
        if(isset($imagen)){
            $currentDate= Carbon::now()->toDateString();
            $nombre=$slug.'-'.$currentDate.'-'.uniqid().'.'.
            $imagen->getClientOriginalExtension();
            if(!file_exists('uploads/cursos')){
                mkdir('uploads/cursos',0777,true);
            }
            $imagen->move('uploads/cursos',$nombre);
        }else{
            $nombre='default.png';
        }

        $curso= new Cursos();
        $curso->titulo=$request->titulo;
        $curso->fecha=$request->fecha;
        $curso->cupo=$request->cupo;
        $curso->precio=$request->precio;
        $curso->informacion=$request->informacion;
        $curso->imgCurso=$nombre;

        $curso->save();
        return redirect()->route('cursos.index')->with('successMsg','Curso agregado correctamente');
        
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
        $curso=Cursos::find($id);
        return view('admin.cursos.edit', compact('curso'));
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
            'fecha' => 'required',
            'cupo' => 'required',
            'precio' => 'required',
            'informacion' => 'required',
            'imgCurso' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $imagen=$request->file('imgCurso');
        $slug=str_slug($request->titulo);
        $curso=Cursos::find($id);

        if(isset($imagen)){
            $currentDate= Carbon::now()->toDateString();
            $nombre=$slug.'-'.$currentDate.'-'.uniqid().'.'.
            $imagen->getClientOriginalExtension();
            if(!file_exists('uploads/cursos')){
                mkdir('uploads/cursos',0777,true);
            }
            $imagen->move('uploads/cursos',$nombre);
        }else{
            $nombre=$curso->imgCurso;
        }

        $curso->titulo=$request->titulo;
        $curso->fecha=$request->fecha;
        $curso->cupo=$request->cupo;
        $curso->precio=$request->precio;
        $curso->informacion=$request->informacion;
        $curso->imgCurso=$nombre;

        $curso->save();
        return redirect()->route('cursos.index')->with('successMsg','Curso modificado correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso= Cursos::find($id);
        if(file_exists('uploads/cursos/'.$curso->imgCurso))
        {
            unlink('uploads/cursos/'.$curso->imgCurso);
        }
        $curso->delete();
        return redirect()->back()->with('successMsg','Curso eliminado correctamente');
    }
}
