@extends('site.templates.site_default')
@section('content')
<div class="container">
      <h3> Faça log-in na nossa plataforma agora mesmo!</h3>
      <br />
      <br />
        <div class="row">
            <form class="col s8" action="{{ route('home') }}" method="POST">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                  <div class="card card-content">
                        @include('templates.partials.alerts')
                        <div class="input-field col s8">
                            <i class="material-icons prefix">perm_identity</i>
                            <input id="cpf" name="cpf" type="text" class="validate"/>
                            <label class="active" for="cpf">CPF</label>
                            @if($errors->has('cpf'))
                              <span>{{ $errors->first('cpf') }}</span>
                            @endif
                        </div>
                        <div class="input-field col s8">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="password" name="password" type="password" class="validate"/>
                            <label for="password">Senha</label>
                            @if($errors->has('password'))
                                <span>{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="card-action input-field col s8">
                          <button class="waves-effect waves-light green darken-4 btn" type="submit">Sign In</button>
                        </div>
                  </div>
              </div>
            </form>
        </div>
</div>
@stop
