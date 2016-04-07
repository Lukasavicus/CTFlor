<div>
  <div class="nav-wrapper brown lighten-1" height="200px" align="center">
      <img src="images/CTFlorfaixa.png" style="width:40%; max-height:100px;">
      <nav>
        <div class="nav-wrapper brown darken-4">

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
                </div>
                </a>
              </li>
              <li class="divider"></li>
              <li ><a href="{{ route('associacao.subscribingactivity') }}">Sair</a></li>
            </ul>

          <ul class="left hide-on-med-and-down">
            <!-- <li><a href="{{ route('site') }}"><img src="images/CTFlor2.jpg" width="30px" height="30px"></a></li> -->
            <li class=""><a href="{{ route('site') }}">CTFlor</a></li>
            <li class=""><a href="{{ route('site.local') }}">Localização</a></li>
            <li class=""><a href=" {{ route('site.subscribe') }} ">Inscrições</a></li>
            <!-- <li class=""><a href="#">Trabalhos</a></li> -->
            <li class=""><a href="{{ route('site.programacao') }}">Agenda</a></li>
            <li class=""><a href="{{ route('site.packages') }}">Pacotes</a></li>
            <li class=""><a href="#">Patrocinadores</a></li>
            <li class=""><a href="{{ route('site.login') }}">Login</a></li>
          </ul>
        </div>
      </nav>
  </div>
</div>
