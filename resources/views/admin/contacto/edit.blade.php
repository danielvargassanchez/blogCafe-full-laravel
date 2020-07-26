@extends('layouts.partial.app')


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Responder mensaje</h4>
          </div>
          <div class="card-body">

            <form method="POST" action="{{ route('contacto.update', $contacto->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre cliente</label>
                    <input type="text" value="{{ $contacto->nombre }}" class="form-control" name="nombre"  readonly="readonly">
                  </div>
                </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Correo cliente</label>
                      <input type="text" value="{{ $contacto->email }}" class="form-control" name="email"  readonly="readonly">
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mensaje</label>
                    <textarea name="mensaje"  class="form-control" cols="30" rows="3"  readonly="readonly"> {{ $contacto->mensaje }}</textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Respuesta</label>
                      <textarea name="respuesta"  class="form-control" cols="30" rows="3"></textarea>
                    </div>
                  </div>
                </div>


              <a href="{{ route('contacto.index')}}" class="btn btn-danger">Regresar</a>
              <button type="submit" class="btn btn-primary">Responder</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection