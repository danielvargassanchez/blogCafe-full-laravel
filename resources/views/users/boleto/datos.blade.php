@extends('layouts.app')

@section('content')  



<main class="contenedor">
    <h2 class="centrar-texto">Contacto</h2>

    <div class="grid centrar-columnas">
        <div class="columnas-12">
            <img src="{{ asset('frontend/img/contacto.jpg')}}" alt="imagen contacto">
        </div>

        <div class="columnas-10 formulario-contacto">
            @if(session('message'))
            <div>
                <div class="alert-success">
                <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
                <span>
                    <b> Correcto - </b> {{ session('message') }}</span>
                </div>  
             
            </div>
            @endif
            <br>

            <form action="{{ route('datos.store')}}" method="POST">
                @csrf
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder="Tu Nombre">
                </div>
                <div class="campo">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" placeholder="Tu Correo Electrónico">
                </div>
    
                <div class="campo enviar">
                    <button type="submit" class="btn btn-primario">Enviar boleto a mi correo </button>
                </div>
            </form>


        </div>
    </div>

</main>
@endsection