@extends('layouts.app')
@section('content') 
<div class="contenido-principal contenedor">
    <main class="blog">
        <h2>Consejos y técnicas acerca del café</h2>


        @foreach ($consejos as $key=>$consejo)
        <article class="entrada-blog">
                <div class="imagen">
                        <h3 class="no-margin">{{ $consejo->titulo}}</h3>
                    <img src="uploads/consejos/{{ $consejo->imgConsejo }}" alt="Imagen blog">
                </div>
                <div class="contenido-blog justificar">

                    <p>{{ $consejo->texto }} </p>
                    <br>
                </div>
            </article>
        @endforeach
        
       
    </main>
    <aside class="cursos">
        <h2>Nuestros Cursos y Talleres</h2>

        <ul class="cursos-lista">

            @foreach ($cursos as $curso)
            <li class="curso">
                <h4 class="no-margin">{{ $curso->titulo }}</h4>
                <p class="no-margin">Precio: <span>${{ $curso->precio}}</span> </p>
                <p class="no-margin">Cupo: <span> {{ $curso->cupo}} participantes</span> </p>
                <a href="{{ route('cursos') }}" class="btn btn-secundario">Más Cursos</a>
            </li>
            @endforeach

        </ul>
    </aside>
</div><!--contenido-principal-->
@endsection