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
            <h4 class="card-title">Todos los mensajes</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table" class="table table-hover display" style="width:100%">
                <thead class="text-primary">
                  <tr>
                  <th>
                    ID
                  </th>
                  <th>
                    Nombre 
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Mensaje
                  </th>
                  <th>
                      Respondido
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
                  @foreach ($contactos as $key=>$contacto)
                  <tr>
                    <td> {{ $key + 1 }} </td>
                    <td> {{ $contacto->nombre}} </td>
                    <td> {{ $contacto->email}} </td>
                    <td> {{ $contacto->mensaje}} </td>
                    <td> {{ $contacto->respondido}} </td>
                    <td> {{ $contacto->created_at}} </td>
                    <td> {{ $contacto->updated_at}} </td>
                    <td>
                        <a href="{{ route('contacto.edit',$contacto->id)}}"
                            class="btn btn-info btn-sm"> 
                            <i class="material-icons">mode_edit</i></a>
                    
                    <form id="delete-form-{{ $contacto->id }}" 
                      action=" {{ route('contacto.destroy',$contacto->id) }}"
                      style="display: none;" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                    
                    <button type="button" onClick="if(confirm('¿Estás seguro de eliminar?')){
                      event.preventDefault(); 
                    document.getElementById('delete-form-{{ $contacto->id }}').submit();
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

