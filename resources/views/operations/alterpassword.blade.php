@extends('templates.default_crud')

@section('subheader')
    <h1 class="header center green-text text-darken-3">Opções do Usuário</h1>
    <div class="row center">
      <h5 class="header col s12 light">Você pode alterar a sua senha.</h5>
    </div>
@stop

@section('fields')
    <div class="row">
        <div class="card card-panel">
           
            <form class="col s12" method="POST" action="{{ route('operations.alterpassword') }}">

            	<div class="row">
		            <div class="input-field col s6 offset-s2">
		                <i class="material-icons prefix">perm_identity</i>
		                <input name="oldpassword" id="oldpassword" type="password"/>
		                <label class="active" for="email">Antiga Senha</label>
		            </div>
		        </div>
	        
		        <div class="row">
		            <div class="input-field col s6 offset-s2">
		                <i class="material-icons prefix">perm_identity</i>
		                <input name="password"  id="password" type="password"/>
		                <label class="active" for="password">Nova Senha</label>
		            </div>
		        </div>

		        <div class="row">
		            <div class="input-field col s6 offset-s2">
		                <i class="material-icons prefix">perm_identity</i>
		                <input name="password_confirmation" id="password_confirmation" type="password"/>
		                <label class="active" for="password">Confirmação Nova Senha</label>
		            </div>
		        </div>

	            <div class="row">

                    <div class="input-field col s3 offset-s3">
                        <button id="incluir_alterar" type="submit" class="waves-effect waves-light btn">
                          <i class="material-icons left">input</i>
                          Alterar
                        </button>
                    </div>

                    <div class="input-field col s3">
                      <button id="clearButton_" name="clearButton" class="waves-effect waves-light btn" type="reset" onclick="cancelAll()">
                        <i class="material-icons left">delete</i>
                        Limpar Campos
                      </button>
                    </div>

                </div>


                <input type="hidden" id="_token" name=" _token" value="{{ Session::token() }}">

            </form>
        </div>
    </div>
@stop