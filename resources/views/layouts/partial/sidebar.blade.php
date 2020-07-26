<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Administrador blogCafé
      </a>
    </div>
    <div class="sidebar-wrapper">
            <ul class="nav">
            <li class="nav-item {{ Request::is('admin/consejos*') ? 'active': ''}}" >
              <a class="nav-link" href="{{ route('consejos.index')}}">
                  <i class="material-icons">chrome_reader_mode</i>
                  <p>Consejos</p>
                </a>
              </li>
            <li class="nav-item {{ Request::is('admin/nosotros*') ? 'active': ''}}">
              <a class="nav-link" href="{{ route('nosotros.index')}}">
                  <i class="material-icons">person</i>
                  <p>Nosotros</p>
                </a>
              </li>
             
            <li class="nav-item {{ Request::is('admin/cursos*') ? 'active': ''}}">
              <a class="nav-link" href="{{ route('cursos.index')}}">
                  <i class="material-icons">assignment</i>
                  <p>Cursos</p>
                </a>
              </li>

              <li class="nav-item {{ Request::is('admin/registros*') ? 'active': ''}}">
                <a class="nav-link" href="{{ route('registros.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Registros de cursos</p>
                  </a>
                </li>
              
              
              <li class="nav-item {{ Request::is('admin/contacto*') ? 'active': ''}}">
                <a class="nav-link" href="{{ route('contacto.index') }}">
                  <i class="material-icons">contact_support</i>
                  <p>Contacto</p>
                </a>
              </li>
            </ul>
          </div>
  </div>