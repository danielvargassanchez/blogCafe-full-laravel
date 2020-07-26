@extends('layouts.partial.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endpush


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        @if ($habilitado=='si')
        <a href="{{ route('nosotros.create') }}" class="btn btn-primary">Agregar</a>            
        @endif

 
        
        @if(session('successMsg'))
        <div class="alert alert-success">
          <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
          <span>
            <b> Correcto - </b> {{ session('successMsg') }}</span>
        </div>
        @endif



        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Información nosotros</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table" class="table table-hover display" cellspacing="0" width="100%">
                <thead class="text-primary">
                  <tr>
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
                </tr>
                </thead>



                <tbody>
                  @foreach ($nosotros as $key=>$nos)
                  <tr>

                    <td> {{ $nos->informacion}} </td>
                    <td> {{ $nos->imgNosotros}} </td>
                    <td> {{ $nos->created_at}} </td>
                    <td> {{ $nos->updated_at}} </td>
                    <td> 
                        <a href="{{ route('nosotros.edit',$nos->id)}}"
                        class="btn btn-info btn-sm"> 
                        <i class="material-icons">mode_edit</i></a>
                    
                    <form id="delete-form-{{ $nos->id }}" 
                      action=" {{ route('nosotros.destroy',$nos->id) }}"
                      style="display: none;" method="POST">
                      @csrf
                      @method('DELETE')
                    </form>
                    
                    <button type="button" onClick="if(confirm('¿Estás seguro de eliminar?')){
                      event.preventDefault(); 
                    document.getElementById('delete-form-{{ $nos->id }}').submit();
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

