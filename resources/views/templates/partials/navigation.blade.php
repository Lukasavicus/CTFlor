<div class="navbar-fixed green darken-1">
  <nav>
    <div class="nav-wrapper green lighten-1">

      <ul id="dropdown1" class="dropdown-content">
          <li class=""><a href="{{ route('subscribing') }}">Lista por Atividades</a></li>
          <li class=""><a href="{{ route('subscribingP') }}">Lista por Participantes</a></li>
      </ul>

      <ul id="dropdown2" class="dropdown-content"> <li> <a href="{{ route('controle.principal') }}"> <div class="chip"> <img src="images/yuna.jpg" alt="Contact Person">  {{ Auth::user()['name']}} </div> </a> </li> <li class="divider"></li> <li> <a href="{{ route('site.signout') }}">Sair</a> </li> </ul>
      
      <ul class="left hide-on-med-and-down">
        <li><a href="#">LLLogo</a></li>
        <li class=""><a href="{{ route('home') }}">Home</a></li>
        
        @if( strcmp( Auth::user()->getRole(), "admin") == 0  )
            <li class=""><a href="{{ route('controle.principal') }}">System</a></li>
            <li class=""><a href="{{ route('crud.activity') }}">Activities</a></li>
            <li class=""><a href="{{ route('crud.participant') }}">Participants</a></li>
            <li class=""><a href="{{ route('crud.banca') }}">Board of Examiners</a></li>
            <li class=""><a href="{{ route('crud.event') }}">Events</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Listas - Sub-áreas<i class="material-icons right">arrow_drop_down</i></a></li>
        @endif
        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Opções do Usuário<i class="material-icons right">arrow_drop_down</i></a></li>
        <li class=""><a href="{{ route('site') }}">Event's web site</a></li>
      </ul>

    </div>
  </nav>
</div>
