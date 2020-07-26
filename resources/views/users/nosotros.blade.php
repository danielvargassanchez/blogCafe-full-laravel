@extends('layouts.app')
@section('content') 


<main class="contenedor">
    <h2 class="centrar-texto">Sobre Nosotros</h2>
    @foreach ($nosotros as $nos)
    <div class="grid">
            <div class="columnas-6">
            <img src="{{ asset('uploads/nosotros/'.$nos->imgNosotros) }}" alt="Imagen Nosotros">
            </div>
            <div class="columnas-6 justificar">
                <p>{{$nos->informacion}}</p>
            </div>
        </div>
    @endforeach
   
</main>


@endsection