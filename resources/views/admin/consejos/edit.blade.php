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
            <h4 class="card-title">Nuevo consejo</h4>
          </div>
          <div class="card-body">

            <form method="POST" action="{{ route('consejos.update', $consejo->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Titulo</label>
                    <input type="text" value="{{ $consejo->titulo }}" class="form-control" name="titulo">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Texto</label>
                    <textarea name="texto"  class="form-control" cols="30" rows="3"> {{ $consejo->texto }}"</textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Imagen</label>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <input type="file" name="imgConsejo" value="{{ $consejo->imgConsejo }}">
                </div>
              </div>
              <br>


              <a href="{{ route('consejos.index')}}" class="btn btn-danger">Regresar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection