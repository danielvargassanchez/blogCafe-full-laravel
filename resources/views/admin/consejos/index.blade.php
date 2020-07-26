@extends('layouts.partial.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <a href="{{ route('consejos.create')}}" class="btn btn-primary">Agregar nuevo</a>
        
        @if(session('successMsg'))
        <div class="alert alert-success">
          <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
          <span>
            <b> Correcto - </b> {{ session('successMsg') }}</span>
        </div>
        @endif



        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Todos los consejos</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table" class="table table-hover display" cellspacing="0" width="100%">
                <thead class="text-primary">
                  <tr>
                  <th>
                    ID Consejo
                  </th>
                  <th>
                    Titulo
                  </th>
                  <th>
                    Texto
                  </th>
                  <th>
                    Img
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
                  @foreach ($consejos as $key=>$consejo)
                  <tr>
                    <td> {{ $key + 1 }} </td>
                    <td> {{ $consejo->titulo}} </td>
                    <td> {{ $consejo->texto}} </td>
                    <td> {{ $consejo->imgConsejo}} </td>
                    <td> {{ $consejo->created_at}} </td>
                    <td> {{ $consejo->updated_at}} </td>
                    <td> 
                        <a href="{{ route('consejos.edit',$consejo->id)}}"
                        class="btn btn-info btn-sm"> 
                        <i class="material-icons">mode_edit</i></a>
                    
                    <form id="delete-form-{{ $consejo->id }}" 
                      action=" {{ route('consejos.destroy',$consejo->id) }}"
                      style="display: none;" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                    
                    <button type="button" onClick="if(confirm('¿Estás seguro de eliminar?')){
                      event.preventDefault(); 
                    document.getElementById('delete-form-{{ $consejo->id }}').submit();
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

