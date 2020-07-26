<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administrador
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <!--     Fonts and icons     -->

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="{{ asset('backend/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
  <link href="{{ asset('backend/demo/demo.css')}}" rel="stylesheet" />

<link href="{{ asset('backend/css/datatables.min.css') }}" type="text/css" rel="stylesheet" />

</head>

<body>

<div id="app"> 
      <div class="wrapper ">
        
      @if(Request::is('admin*'))
        @include('layouts.partial.sidebar')
      @endif
      
        <div class="main-panel">
            @if(Request::is('admin*'))
              @include('layouts.partial.topbar')
            @endif
              @yield('content')
            @if(Request::is('admin*'))
              @include('layouts.partial.footer')
            @endif
        </div>
      </div>
</div>

<script src="{{ asset('/backend/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('/backend/js/core/popper.min.js') }}"></script>
<script src="{{ asset('/backend/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('/backend/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/datatables.min.js')}}"></script>





<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>


</body>

</html>