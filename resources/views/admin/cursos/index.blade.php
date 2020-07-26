@extends('layouts.partial.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <a href="{{ route('cursos.create')}}" class="btn btn-primary">Agregar nuevo</a>
        
        @if(session('successMsg'))
        <div class="alert alert-success">
          <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
          <span>
            <b> Correcto - </b> {{ session('successMsg') }}</span>
        </div>
        @endif



        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Todos los cursos</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table" class="table table-hover display" cellspacing="0" width="100%">
                <thead class="text-primary">
                  <tr>
                  <th>
                    ID Curso
                  </th>
                  <th>
                    Titulo
                  </th>
                  <th>
                    Fecha
                  </th>
                  <th>
                    Cupo
                  </th>
                  <th>
                      Precio
                  </th>
                  <th>
                    Información
                  </th>
                  <th>
                      Imagen
                  </th>
                  <th>
                    Creado
                  </th>
                  <th>
                    Modificado
                  </th>
                  <th>
                    Acción
                  </th>
                </tr>
                </thead>



                <tbody>
                  @foreach ($cursos as $key=>$curso)
                  <tr>
                    <td> {{ $key + 1 }} </td>
                    <td> {{ $curso->titulo}} </td>
                    <td> {{ $curso->fecha}} </td>
                    <td> {{ $curso->cupo}} </td>
                    <td> ${{ $curso->precio}} </td>
                    <td> {{ $curso->informacion}} </td>
                    <td> {{ $curso->imgCurso}} </td>
                    <td> {{ $curso->created_at}} </td>
                    <td> {{ $curso->updated_at}} </td>
                    <td> 
                        <a href="{{ route('cursos.edit',$curso->id) }}"
                        class="btn btn-info btn-sm"> 
                        <i class="material-icons">mode_edit</i></a>
                    
                    <form id="delete-form-{{ $curso->id }}" 
                      action=" {{ route('cursos.destroy',$curso->id) }}"
                      style="display: none;" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                    
                    <button type="button" onClick="if(confirm('¿Estás seguro de eliminar?')){
                      event.preventDefault(); 
                    document.getElementById('delete-form-{{ $curso->id }}').submit();
                    }else {
                      event.preventDefault();
                    }"
                    class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button>
                    
                      </td>
                  </tr>
                  @endforeach
                </tbody>



              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

