<div>
  <div class="nav-wrapper brown lighten-1" height="200px" align="center">
      <img src="images/CTFlorfaixa.png" style="width:40%; max-height:200px;">
    </div>
  <nav>
    <div class="nav-wrapper brown lighten-1">
<!--
        <ul id="dropdown1" class="dropdown-content">
          <li class=""><a href="{{ route('associacao.subscribingactivity') }}">Inscrição de Participantes</a></li>
          <li class=""><a href="{{ route('associacao.subscribinglecture') }}">Inscrição de Palestra</a></li>
          <li class=""><a href="{{ route('associacao.subscribingminicourse') }}">Inscrição de Mini-Curso</a></li>
          <li class=""><a href="{{ route('associacao.subscribingtechnicalvisit') }}">Inscrição de Visita Técnica</a></li>
        </ul>
-->

        <ul id="dropdown1" class="dropdown-content">
          <li class=""><a href="{{ route('subscribing') }}">Lista por Atividades</a></li>
          <li class=""><a href="{{ route('subscribingP') }}">Lista por Participantes</a></li>
        </ul>

        <ul id="dropdown2" class="dropdown-content">
          <li>
            <a href="{{ route('controle.principal') }}">
            <div class="chip">
              <img src="http://servicosweb.cnpq.br/wspessoa/servletrecuperafoto?tipo=1&id=K8737489J2" alt="Contact Person">
              {{ Auth::user()['name']}}
              Lucas
            </div>
            </a>
          </li>
          <li class="divider"></li>
          <li ><a href="{{ route('associacao.subscribingactivity') }}">Sair</a></li>
        </ul>

      <ul class="left hide-on-med-and-down">
        <li><a href="{{ route('site') }}"><img src="images/CTFlor2.jpg" width="30px" height="30px"></a></li>
        <li class=""><a href="{{ route('site') }}">Apresentação</a></li>
        <li class=""><a href="{{ route('site.local') }}">Local</a></li>
        <li class=""><a href="#">Inscrição</a></li>
        <li class=""><a href="#">Certificados</a></li>
        <li class=""><a href="#">Trabalhos</a></li>
        <li class=""><a href="{{ route('site.programacao') }}">Programação</a></li>
        <li class=""><a href="#">Palestrantes</a></li>
        <li class=""><a href="#">Palestras</a></li>
        <li class=""><a href="#">Patrocínio</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Outras Edições<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Opções<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>
</div>