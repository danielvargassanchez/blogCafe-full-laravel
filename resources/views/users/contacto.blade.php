@extends('layouts.app')

@section('content')  
<main class="contenedor">
    <h2 class="centrar-texto">Contacto</h2>

    <div class="grid centrar-columnas">
        <div class="columnas-12">
            <img src="{{ asset('frontend/img/contacto.jpg')}}" alt="imagen contacto">
        </div>

        <div class="columnas-10 formulario-contacto">
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif


            <form action="{{ route('contactar.store')}}" method="POST">
                @csrf
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder="Tu Nombre">
                </div>
                <div class="campo">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" placeholder="Tu Correo Electrónico">
                </div>
                <div class="campo mensaje">
                    <label for="mensaje">Mensaje</label>
                    <textarea  name="mensaje" id="mensaje"></textarea>
                </div>
                <div class="campo enviar">
                    <button type="submit" class="btn btn-primario">Enviar </button>
                </div>
            </form>


        </div>
    </div>

</main>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>
@endpush