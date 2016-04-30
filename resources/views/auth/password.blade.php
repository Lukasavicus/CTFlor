<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>CTFlor</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/animate.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!--  Scripts-->
    <script type="text/javascript" src="../../js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/ownFunctions.js"></script>

</head>
<body>

<div class="navbar-fixed container-fluid">
  <nav class="brown darken-4 " >
        <a href="{{ route('site') }}" class="brand-logo">CTFlor</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="{{ route('site.subscribe') }}">INSCRIÇÕES</a></li>
          <li><a href="{{ route('site.login') }}">LOGIN</a></li>
        </ul>
    </nav>
</div>

<div class="container">
    @include('templates.partials.alerts')
    <h4 class="text-center"> Recupere a sua senha agora mesmo!</h4>

    <div class="row text-center">
        <form class="col s12" action="/password/email" method="POST">
             {!! csrf_field() !!}
            <div class="row">
                <div class="card card-content">
                    <div class="input-field col s8">
                            <i class="material-icons prefix">perm_identity</i>
                            <input name="email" type="email" value="{{ old('email') }}"/>
                            <label class="active" for="email">Email</label>
                    </div>
                    <div class="card-action input-field col s8">
                        <button class="waves-effect waves-light green darken-4 btn" type="submit">Enviar Link de Redefinição de Senha</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<footer class="page-footer brown darken-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">Engenharia Florestal Jr.</h5>
                  <h6 class="white-text">Resumo:</h6>
                  <p class="grey-text text-lighten-4">A Empresa Júnior do curso da Engenharia Florestal é uma empresa incubada pela UFSCar que fornece a comunidade eventos de relevância profissional e acadêmica.</p>
                </div>

                  <div class="col l6 m6 s12">

                        <h5 class="white-text">Social</h5>
                        <ul>
                            <li>
                                <a class="white-text" href="https://www.facebook.com/joash.c.pereira">
                                    <i class="small fa fa-facebook-official white-text"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a class="white-text" href="https://github.com/joashp">
                                    <i class="small  fa fa-youtube white-text"></i> YouTube
                                </a>
                            </li>
                        </ul>

                </div>

            </div>
            <div class="footer-copyright text-center">
              Powered by <a class="brown-text text-lighten-3" href="http://optimizetechnology.wordpress.com">Optmize Tecnology</a> with Love
            </div>
        </div>
    </footer>
</body>
</html>