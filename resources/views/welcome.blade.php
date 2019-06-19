<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav mr-auto">
                        {{-- SEGURIDAD --}}
                        @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "seguridad")
                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fas fa-lock" aria-hidden="true"></i> Seguridad<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                        @if($c->nombre == "indice perfiles")
                                        <li>
                                            <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{url ('perfil')}}','Perfiles')">
                                                <i class="fa fa-universal-access" aria-hidden="true"></i> Perfiles
                                            </a>
                                        </li>
                                        @endif
                                        @if($c->nombre == "indice usuarios")
                                        <li>
                                            <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{url ('usuario')}}','Usuarios')">
                                                <i class="fa fa-user-circle" aria-hidden="true"></i> Usuarios
                                            </a>
                                        </li>
                                        @endif
                                    @endforeach          
                                </ul>
                            </li>
                            @break
                            @endif
                        @endforeach
                        {{-- RECURSOS HUMANOS --}}
                        @foreach(Auth::user()->perfil->componentes as $componente)
                            @if($componente->modulo->nombre == "rh")
                            <li class="dropdown">
                                <a tabindex="-1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fa fa-briefcase" aria-hidden="true"></i> Recursos Humanos <span class="caret"></span> </a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->perfil->componentes as $c)
                                    @if($c->nombre == "crear empleado")
                                    <li>
                                        <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/empleados/create')}}','Agrega Empleado')">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Alta de Empleado
                                        </a>
                                    </li>
                                    @endif
                                    @if($c->nombre == "indice empleados")
                                    <li>
                                        <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/empleados')}}','Buscar empleado')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Busqueda de Empleados
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach                 
                                </ul>
                            </li>
                            @break
                            @endif
                        @endforeach
                        {{-- PRECARGAS FALTA AUTH --}}
                        <li class="dropdown">
                            <a tabindex="-1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="fas fa-upload"></i> Precargas <span class="caret"></span> </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/puestos')}}','Puestos')">
                                        <i class="fas fa-upload"></i> Tipo de puestos
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/contratos')}}','Contratos')">
                                        <i class="fas fa-upload"></i> Tipo de contratos
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/bajas')}}','Bajas')">
                                        <i class="fas fa-upload"></i> Tipo de bajas
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/licencias')}}','Licencias')">
                                        <i class="fas fa-upload"></i> Tipo de licencias
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ route('prestaciones.index')}}','Prestaciones')">
                                        <i class="fas fa-upload"></i> Prestaciones
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ route('amonestacion.index')}}','Amonestaciones')">
                                        <i class="fas fa-upload"></i> Tipo de Amonestaciones
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- CLIENTES --}}
                        <li class="dropdown">
                            <a tabindex="-1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><i class="far fa-user-circle"></i> Clientes <span class="caret"></span> </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/clientes')}}','Clientes')">
                                        <i class="fas fa-user-friends"></i> Clientes
                                    </a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a  class="dropdown-item" tabindex="-1" href="#">
                                        <i class="fas fa-id-card-alt"></i> Credenciales
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('/empleado/credencials/create')}}',' Nueva credencial al cliente')" style="color: black;">
                                                <i class="far fa-id-card"></i> Nueva Credencial
                                            </a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a tabindex="-1" href="#" onclick="AgregarNuevoTab('{{ url('/empleado/credencials')}}','Credenciales')"  style="color: black;">
                                                <i class="far fa-id-card"></i> Ver credenciales
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        {{-- Cotizaciones --}}
                        <li class="dropdown">
                            <a tabindex="-1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> <i class="fas fa-truck-loading"></i> Cotizaciones</a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/cotizaciones/index') }}','Cotizaciones')">
                                       <i class="fas fa-people-carry"></i> Cotizaciones
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/prospectos') }}','Prospectos')">
                                       <i class="fas fa-user-clock"></i> Prospectos
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/commodities')}}','Naturaleza del producto')">
                                        <i class="fas fa-upload"></i> Naturaleza del producto/Commodities
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item" onclick="AgregarNuevoTab('{{ url('/servicios')}}','Servicios extras')">
                                        <i class="fas fa-upload"></i> Servicios Extras
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid" style="width: 100%; height: 100%;">
            <ul id="tabsApp" class="nav nav-tabs" role="tab-list"></ul>
            <div id="contenedortab" class="tab-content"></div>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
