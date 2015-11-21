<div class="navbar-fixed green darken-1">
  <nav>
    <div class="nav-wrapper green lighten-1">

        <ul id="dropdown1" class="dropdown-content">
          <li class=""><a href="{{ route('subscribing') }}">Lista por Atividades</a></li>
          <li class=""><a href="{{ route('subscribingP') }}">Lista por Participantes</a></li>
        </ul>

        <ul id="dropdown2" class="dropdown-content">
          <li>
            <a href="{{ route('controle.principal') }}">
            <div class="chip">
              <img src="images/yuna.jpg" alt="Contact Person">
              {{ Auth::user()['name']}}
            </div>
            </a>
          </li>
          <li class="divider"></li>
          <li ><a href="{{ route('associacao.subscribingactivity') }}">Sair</a></li>
        </ul>

      <ul class="left hide-on-med-and-down">
        <li><a href="#">Logo</a></li>
        <li class=""><a href="{{ route('home') }}">Home</a></li>
        <li class=""><a href="{{ route('controle.principal') }}">Sistema</a></li>
        <li class=""><a href="{{ route('crud.activity') }}">Atividades</a></li>
        <li class=""><a href="{{ route('crud.participant') }}">Participantes</a></li>
        <li class=""><a href="{{ route('crud.event') }}">Eventos</a></li>
        <li class=""><a href="{{ route('crud.material') }}">Materiais</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Listas - Sub-áreas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Opções do Usuário<i class="material-icons right">arrow_drop_down</i></a></li>
        <li class=""><a href="{{ route('site') }}">Site do Evento</a></li>
      </ul>
    </div>
  </nav>
</div>
