<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestor de roles de usuarios</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="../faw/css/font-awesome.min.css">

        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #581845 ;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"  style="color:#FCFCFC";>Inicio</a>
                        <a href="{{ url('/users') }}" style="color:#FCFCFC";>Usuarios</a>
                        <a href="{{ url('/roles') }}" style="color:#FCFCFC";>Roles</a>
                        <a href="{{ url('/files') }}" style="color:#FCFCFC";>Archivos</a>
                    @else
                    <i class="fa fa-sign-in" aria-hidden="true" style="color:#FCFCFC";>
                        <a href="{{ route('login') }}" style="color:#FCFCFC"; >Ingresar</a>
                        </i>
                    @endauth
                </div>
            @endif
         

            <div class="content">
                <div class="title m-b-md " style="color:#FCFCFC";>
                    Gestor de roles de usuarios 
                </div>
            </div>
        </div>
    </body>
</html>
