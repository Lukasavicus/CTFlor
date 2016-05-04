<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

		<title>CTFlor - Control System</title>

		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		<link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		<link href="css/materialize.clockpicker.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/materialize.clockpicker.css" type="text/css" rel="stylesheet" media="screen,projection"/>


		<!--  Scripts-->
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>

		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>

		<script type="text/javascript" src="js/materialize.clockpicker.js"></script>
		<script type="text/javascript" src="../js/materialize.clockpicker.js"></script>

	</head>
<body>
<div class="navbar-fixed container-fluid">
    <nav class="green darken-3">
        <div class="nav-wrapper">
			<a href="{{ route('site') }}" class="brand-logo">CTFlor</a>
            <ul class="right hide-on-med-and-down">
                <li class=""><a href="{{ route('controle.principal') }}">Home</a></li>
                <li class=""><a href="{{ route('crud.material') }}">Submissões</a></li>
                @if( strcmp( Auth::user()->getRole(), "organization") == 0  )
                    <li class=""><a href="{{ route('crud.activity') }}">Atividades</a></li>
                    <li class=""><a href="{{ route('crud.participant') }}">Participantes</a></li>
                    <li class=""><a href="{{ route('crud.banca') }}">Banca Examinadora</a></li>
                    <li class=""><a href="{{ route('crud.event') }}">Eventos</a></li>
                    <li><a class="dropdown-button" href="#!"  data-beloworigin="true" data-activates="dropdown1">Listas de Sub-áreas<i class="material-icons right">arrow_drop_down</i></a></li>
                @endif
                <li><a class="dropdown-button" href="#!"  data-beloworigin="true" data-activates="dropdown3">Inscrever-se<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!"  data-beloworigin="true" data-activates="dropdown2">Opções do Usuário<i class="material-icons right">arrow_drop_down</i></a></li>
                <!-- <li class=""><a href="{{ route('site') }}">Site do Evento</a></li> -->
            </ul>
            <ul id="dropdown1" class="dropdown-content">
                <li class=""><a href="{{ route('subscribing') }}">Lista por Atividades</a></li>
            </ul>
            <ul id="dropdown2" class="dropdown-content">
                <li> <a href="{{  route('operations.alteruserinfo') }}">Alterar Informações Pessoais</a> </li>
                <li> <a href="{{  route('operations.alterpassword') }}">Alterar Senha</a> </li>
                <li class="divider"></li>
                <li> <a href="{{ route('site.signout') }}">Sair</a> </li>
            </ul>
            <ul id="dropdown3" class="dropdown-content">
                <li class=""><a href="{{ route('operations.activity_subscription') }}">Palestras</a></li>
                <li class=""><a href="{{ route('operations.mini_course') }}">Mini-Curso</a></li>
                <li class=""><a href="{{ route('operations.technical_visit') }}">Visita Técnica</a></li>
            </ul>
        </div>
    </nav>
</div>

@yield('content')


@include('templates.partials.footer')
