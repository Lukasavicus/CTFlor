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


<div class="navbar-fixed green darken-1">
  <nav>
    <div class="nav-wrapper green lighten-1">

      <ul id="dropdown1" class="dropdown-content">
          <li class=""><a href="{{ route('subscribing') }}">Lista por Atividades</a></li>
          <li class=""><a href="{{ route('subscribingP') }}">Lista por Participantes</a></li>
      </ul>

      <ul id="dropdown2" class="dropdown-content">
          <li>
              <a href="">
                  <div class="chip">	<img src="images/yuna.jpg" alt="Contact Person">  Sarava	</div>
              </a>
          </li>
          <li class="divider"></li>
          <li>
              <a href="{{ route('site.signout') }}">Sair</a>
          </li>
      </ul>

      <ul class="left hide-on-med-and-down">
        <li><a href="#">Logo</a></li>
        <li class=""><a href="{{ route('home') }}">Home</a></li>
        <li class=""><a href="{{ route('crud.material') }}">Materiais</a></li>

        @if( strcmp( Auth::user()->getRole(), "organization") == 0  )
            <li class=""><a href="{{ route('controle.principal') }}">Sistema</a></li>
            <li class=""><a href="{{ route('crud.activity') }}">Atividades</a></li>
            <li class=""><a href="{{ route('crud.participant') }}">Participantes</a></li>
            <li class=""><a href="{{ route('crud.banca') }}">Banca Examinadora</a></li>
            <li class=""><a href="{{ route('crud.event') }}">Eventos</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Listas de Sub-áreas<i class="material-icons right">arrow_drop_down</i></a></li>
        @endif

        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Opções do Usuário<i class="material-icons right">arrow_drop_down</i></a></li>
        <li class=""><a href="{{ route('site') }}">Site do Evento</a></li>
      </ul>

    </div>
  </nav>
</div>

@yield('content')


@include('templates.partials.footer')
