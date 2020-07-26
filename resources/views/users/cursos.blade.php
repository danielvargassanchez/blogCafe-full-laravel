@extends('layouts.app')
@section('content') 

<main class="contenedor">
    <h2 class="centrar-texto">Nuestros Próximos Cursos y Talleres</h2>

    @if(session('cancel'))
    <div class="alert-cancel">
      <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
      <span>
        <b> Error - </b> {{ session('cancel') }}</span>
    </div>
    @endif
    
    @if(session('message'))
    <div class="alert-success">
      <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
      <span>
        <b> Correcto - </b> {{ session('message') }}</span>
    </div>
    @endif 

    @foreach ($cursos as $curso)

    @if( $curso->fecha >= $hoy )
   
        <article class="curso grid">
                <div class="columnas-4">
                    <img src="uploads/cursos/{{ $curso->imgCurso }}" alt="Imagen Curso">
                </div>
                <div class="columnas-8">

                    <h4 class="no-margin">{{ $curso->titulo}}</h4>
                    <p class="no-margin">Fecha: <span>{{ $curso->fecha}}</span> </p>
                    <p class="no-margin">Precio: <span>${{ $curso->precio }} </span> </p>
                    <p class="no-margin">Cupo: <span>{{ $curso->cupo}} Espacios disponibles</span> </p>
        
                    <p class="descripcion justificar"> {{ $curso->informacion}}</p>
                    @if( ($curso->cupo)>0  )
                     <a href="{{route ('mostrar.show',$curso->id)}}" class="btn btn-secundario">Comprar pase al curso</a>
                    @endif
                </div>
        </article>
    @endif
    @endforeach


</main>

@endsection