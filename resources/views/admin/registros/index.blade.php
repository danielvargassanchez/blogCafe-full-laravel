@extends('layouts.partial.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        
        @if(session('successMsg'))
        <div class="alert alert-success">
          <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
          <span>
            <b> Correcto - </b> {{ session('successMsg') }}</span>
        </div>
        @endif



        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Todos los registros</h4>
          </div>
          
          <div class="card-body">
            <div class="table-responsive">
              <table id="table" class="table table-hover display" cellspacing="0" width="100%">
                <thead class="text-primary">
                  <tr>
                  <th>
                    ID Registro
                  </th>
                  <th>
                    Nombre
                  </th>
                  <th>
                    Correo
                  </th>
                  <th>
                    Código
                  </th>
                  <th>
                      ID Curso
                  </th>
                  <th>
                    Creado
                  </th>
                  <th>
                    Modificado
                  </th>
                </tr>
                </thead>



                <tbody>
                  @foreach ($registros as $key=>$registro)
                  <tr>
                    <td> {{ $registro->id }} </td>
                    <td> {{ $registro->nombre}} </td>
                    <td> {{ $registro->correo}} </td>
                    <td> {{ $registro->codigo}} </td>
                    <td> {{ $registro->cursos_id}} </td>
                    <td> {{ $registro->created_at}} </td>
                    <td> {{ $registro->updated_at}} </td>
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
