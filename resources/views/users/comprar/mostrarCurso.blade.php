@extends('layouts.app')
@section('content')  

<main class="contenedor">

<article class="curso grid">
    <div class="columnas-4">
        <img src="{{ asset('uploads/cursos')}}/{{$curso->imgCurso}}" alt="Imagen Curso">
    </div>
    
    <div class="columnas-8">
        <h4 class="no-margin">{{ $curso->titulo}}</h4>
        <p class="no-margin">Fecha: <span>{{ $curso->fecha}}</span> </p>
        <p class="no-margin">Precio: <span>${{ $curso->precio }} </span> </p>
        <p class="no-margin">Cupo: <span>{{ $curso->cupo}} Espacios disponibles</span> </p>

        <p class="descripcion"> {{ $curso->informacion}}</p>

        {{ session(['idCurso'=>$curso->id])}}
        {{ session()->flash('titulo', $curso->titulo) }}
        {{ session()->flash('precio', $curso->precio) }}
    
        <a href="{{ route('payment')}}" class="btn btn-secundario">Comprar</a>
    </div>
</article>


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