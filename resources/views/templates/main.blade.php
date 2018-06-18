<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo_pagina') -Fakeapop</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
          integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
          crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/css/bootstrap-slider.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> @yield('estilos')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>
<header class="bg-primary">
    @include('templates.assets.header')
    <div class="container text-center">
        <div class="row justify-content-sm-center">
            @include('flash::message')
        </div>
    </div>
</header>

<main class="container">
    <div id="sidenav" class="sidenav p-4">
        <div class="text-right"><a href="#" id="closeIcon" class="close-icon" data-toggle="popover" data-trigger="hover"
                                   data-placement="right"
                                   data-content="Cerrar"> &times;</a></div>
        @guest
            <h2 class="text-center mb-5">Bienvenido</h2>
            ¿Ya estas registrado?<a href="{{route('login')}}">Entra</a>
            <hr> ¿No tienes una cuenta?<a href="{{route('register')}}">Regístrate</a> @else
                <div class="row justify-content-sm-center">
                    @if(auth()->user()->imagen!=null)
                        <img class="d-flex rounded-circle z-depth-1-half "
                             src="{{asset('imagenes/perfil/'.auth()->user()->imagen)}}" height="150"
                             width="150" alt="Avatar"> @else
                        <img class="d-flex rounded-circle z-depth-1-half "
                             src="{{asset('imagenes/perfil/user-default.png')}}" height="150" width="150"
                             alt="Avatar"> @endif
                </div>
                <h2 class=" text-center mt-4">{{ Auth::user()->nombre }}</h2>
                <hr class="mb-5">
                <section class="lead">
                    <a class="nav-link text-dark" href="{{ route('ver_productos_usuario',auth()->user()->id)}}"> <span
                                class="fa fa-clipboard-list text-primary"></span> Mis Productos</a>
                    <a class="nav-link text-dark"
                       href="{{ route('ver_productos_usuario_favoritos',auth()->user()->id)}}"> <span
                                class="fa fa-heart text-danger"></span> Mis Favoritos</a>
                    <a class="nav-link text-dark" href="{{ route('administrar_perfil',auth()->user()->id)}}"> <span
                                class="fa fa-edit text-success"></span> Editar Perfil</a>

                    <a href="{{ route('logout')}}" class="nav-link text-dark" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> <span class="fas fa-sign-out-alt"></span> Log
                        Out
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </section>
                @endguest
    </div>
    <div class="wrapper mt-4">
        <div class="content">@yield('contenido')</div>
        <div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;" data-toggle="popover"
             data-trigger="hover"
             data-placement="right" data-content="Crear producto">
            <a href="{{ route('crear_producto') }}" class="btn-floating btn-large bg-primary waves-effect waves-light">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>

</main>
@include('templates.assets.footer')

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.2/bootstrap-slider.min.js"></script>

<script>
    @auth()
    $(document).ready(function () {
// popovers Initialization
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
        var route = "{{route('notificaciones')}}";

        $.ajax({
            type: "GET",
            dataType: "json",
            url: route,
            success: function (data) {
                if (data !== '') {
                    var cont = 0;
                    var url = '{{ route("valoracion_compra",":id") }}';
                    $('#descripcion_notificacion').append("<h6 class='text-center mt-2'><strong>Notificaciones</strong></h6>")
                    for (i = 0; i < data.length; i++) {
                        cont++;
                        url = url.replace(':id', data[i].id);

                        $('#descripcion_notificacion').append("<a class='dropdown-item waves-effect waves-light ' href= '" + url + "' ><i class='fa fa-star mr-2 text-primary  text-center '></i><span>Valora la compra de <strong>" + data[i].nombre_producto + "</strong></span></a><hr class='text-muted mb-0 mt-0'>");

                        url = '{{ route("valoracion_compra",":id") }}';
                    }
                    $('#numero_notificaciones').text(cont)
                } else {
                    $('#descripcion_notificacion').append(" <span class='text-light ml-2 row '>No tienes notificaciones</span>")

                }
            }
        })
    })
    @endauth

    $('#menuIcon').click(function () {
        $('#sidenav').toggle("slide");
    });

    $('#closeIcon').click(function () {
        $('#sidenav').hide("slide");
    });
    $('#navButton').click(function () {
        $('#mySidenav').slideToggle();
    });
</script>

@yield('scripts')


</body>

</html>