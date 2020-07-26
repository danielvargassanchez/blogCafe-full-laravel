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
            <h4 class="card-title">Nueva información nosotros</h4>
          </div>
          <div class="card-body">

            <form method="POST" action="{{ route('nosotros.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Información</label>
                    <textarea name="informacion" class="form-control" cols="30" rows="3">
                    </textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label class="control-label">Imagen Nosotros</label>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <input type="file" name="imgNosotros">
                </div>
              </div>
              <br>


              <a href="{{ route('nosotros.index')}}" class="btn btn-danger">Regresar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection