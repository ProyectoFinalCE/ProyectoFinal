<!--Navbar-->
<nav class="navbar navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="{{ route('index') }}">Fakeapop</a>
    <ul class="nav navbar-rigth mr-5 list-group-flush">
        @guest
            @else
                <li class="nav-item dropdown notifications-nav show text-white mr-5">

                     <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span class="badge bg-secondary" id="numero_notificaciones"></span>

                    <i class="fa fa-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-info " aria-labelledby="navbarDropdownMenuLink" id="descripcion_notificacion">

                </div>

                </li>
                @endguest
        <a class="btn-floating btn-lg text-white light-blue darken-4"  data-toggle="tooltip" data-placement="bottom" title="Crear Producto" href="{{route('crear_producto')}}"><i class="fa fa-plus"></i></a>
        <li class="nav-item dropdown">
            @guest
                <a class="text-white nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar Usuario</a>
            @else
            <a class="text-white nav-link dropdown-toggle mr-5" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->nombre_usuario}}</a>

                    @endguest
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                @guest
                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                @else
                        <a class="nav-link text-light" href="{{ route('ver_productos_usuario',auth()->user()->id)}}">Mis Productos</a>
                    <a class="nav-link text-light" href="{{ route('ver_productos_usuario_favoritos',auth()->user()->id)}}">Mis Favoritos</a>
                        <a class="nav-link text-light" href="{{ route('administrar_perfil',auth()->user()->id)}}">Editar Perfil</a>

                        <a href="{{ route('logout')}}"  class="nav-link text-light" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Log Out
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </a>
                @endguest
            </div>
        </li>
    </ul>
</nav>
