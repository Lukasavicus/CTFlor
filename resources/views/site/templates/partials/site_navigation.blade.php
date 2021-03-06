<div class=" navbar-fixed container-fluid">
  <nav class="brown darken-4 " >
      <div class="nav-wrapper">
        <a href="{{ route('site') }}" class="brand-logo">CTFlor</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#event">O EVENTO</a></li>
          <li><a href="#submissao">SUBMISSÕES</a></li>
        <!--  <li><a href="#">PROGRAMAÇÃO</a></li> -->
        <!--  <li><a href="#">PALESTRANTES</a></li> -->
          <li><a href="#organization">ORGANIZAÇÃO</a></li>
          <li><a href="#location">LOCAL</a></li>
          <li><i class="material-icons">more_vert</i></li>
          <li><a href="{{ route('site.subscribe') }}">INSCRIÇÕES</a></li>
          <li><a href="{{ route('site.login') }}">LOGIN</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="#event">O EVENTO</a></li>
          <li><a href="#submissao">SUBMISSÕES</a></li>
          <!-- <li><a href="#">PROGRAMAÇÃO</a></li> -->
          <!-- <li><a href="#">PALESTRANTES</a></li> -->
          <li><a href="#">ORGANIZAÇÃO</a></li>
          <li><a href="#location">LOCAL</a></li>
          <li><a href="{{ route('site.subscribe') }}">INSCRIÇÕES</a></li>
          <li><a href="{{ route('site.login') }}">LOGIN</a></li>
        </ul>
      </div>
    </nav>
</div>
