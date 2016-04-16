@extends('site.templates.site_default_login')
@section('content')
<div class="container">
        @include('templates.partials.alerts')
        <h3> Entre na plataforma do CTFlor agora mesmo.</h3>
        <br />

        <div class="row">
                <form class="col s12" action="{{ route('home') }}" method="POST">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row">
                            <div class="card card-content">
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
                                                <label for="password">Password</label>
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
