@extends('site.templates.site_default_login')
@section('content')
<div class="container">
        @include('templates.partials.alerts')
        <h4 class="text-center"> Acompanhe sua inscrição</h4>

        <div class="row text-center">
                <form class="col s12" action="{{ route('home') }}" method="POST">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="card card-content">
                                        <div class="input-field col s8">
                                                <i class="material-icons prefix">perm_identity</i>
                                                <input id="email" name="email" type="email" class="validate"/>
                                                <label class="active" for="email">Email</label>
                                                @if($errors->has('email'))
                                                    <span>{{ $errors->first('email') }}</span>
                                                @endif
                                        </div>
                                        <div class="input-field col s8">
                                                <i class="material-icons prefix">vpn_key</i>
                                                <input id="password" name="password" type="password" class="validate"/>
                                                <label for="password">Password</label>
                                                @if($errors->has('password'))
                                                        <span>{{ $errors->first('password') }}</span>
                                                @endif
                                        </div>

                                        <div class="card-action input-field col s8">
                                            <button class="waves-effect waves-light green darken-4 btn" type="submit">Sign In</button>
                                            <a class="waves-effect waves-light green darken-4 white-text btn" href="/password/email">Esqueci Senha</a>
                                        </div>
                            </div>
                    </div>
                </form>
        </div>
</div>

@stop
