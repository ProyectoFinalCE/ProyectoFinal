@extends('templates.main')
@section('titulo_pagina', 'About')
@section('contenido')
    <header>
        <h1 class="text-center mb-5">Sobre nosotros</h1>
    </header>
    <div class="about text-justify">
        <h2>F.A.Q</h2>
        <div class="mb-4">
            <div>
                <p class="lead">
                    Pregunta frecuente 1
                </p>
                <p>
                    Respuesta frecuente 1
                </p>
            </div>
            <div>
                <p class="lead">
                    Pregunta frecuente 2
                </p>
                <p>
                    Respuesta frecuente 2
                </p>
            </div>
            <div>
                <p class="lead">
                    Pregunta frecuente 3
                </p>
                <p>
                    Respuesta frecuente 3
                </p>
            </div>
        </div>
        <hr class="mb-4">
        <h2>Cookies</h2>
        <div class="cookies mb-4">
            <p>

              Las cookies son pequeños archivos que un sitio o su proveedor de servicios transfiere al disco duro de su equipo a través de su navegador web (si lo permite) que permite que los sistemas del sitio o del proveedor de servicios reconozcan su navegador y capturen y recuerden cierta información. Por ejemplo, usamos cookies para Recordar su inicio de sesion. También se utilizan para ayudarnos a comprender sus preferencias en función de la actividad del sitio anterior o actual, lo que nos permite brindarle mejores servicios. También utilizamos cookies para ayudarnos a recopilar datos agregados sobre el tráfico del sitio y la interacción del sitio para que podamos ofrecer mejores experiencias y herramientas del sitio en el futuro.
            </p>
           Usamos cookies para:
            <ul>
                <li> Recordar su inicio de sesion</li>
                <li>Comprenda y guarde las preferencias del usuario para futuras visitas.</li>
            </ul>
            <p>

                También podemos usar servicios confiables de terceros que rastrean esta información en nuestro nombre. Puede elegir que su equipo le advierta cada vez que se envía una cookie,
                o puede optar por desactivar todas las cookies. Lo haces a través de la configuración de tu navegador. Como el navegador es un poco diferente, mira el Menú de Ayuda de tu navegador para aprender
                la forma correcta de modificar tus cookies Si desactiva las cookies, es posible que algunas de las funciones que hacen que su sitio sea más eficiente no funcionen correctamente.
                No afectará la experiencia del usuario que hace que la experiencia de su sitio sea más eficiente y puede que no funcione correctamente.
            </p>
        </div>
        <hr class="mb-4">
        <h2>Copyright</h2>
        <div class="cookies mb-4">
            <p>
                Este sitio web y su contenido están protegidos por derechos de autor de FakeApop - © FakeApop 2018. Todos los derechos reservados.

                Se prohíbe cualquier redistribución o reproducción de parte o la totalidad de los contenidos de cualquier forma que no sea la siguiente:            </p>
            <ul>
                <li>Puede imprimir o descargar a un disco duro local extractos para su uso personal y no comercial solamente</li>
                <li>Puede copiar el contenido a terceros individuales para su uso personal, pero solo si reconoce que el sitio web es la fuente del material.</li>
            </ul>
            <p>

                No puede, excepto con nuestro permiso expreso por escrito, distribuir o explotar comercialmente el contenido.
                Tampoco puede transmitirlo ni almacenarlo en ningún otro sitio web u otra forma de sistema de recuperación electrónica.            </p>
        </div>
    </div>
@endsection