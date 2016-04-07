@extends('templates.default')
@section('content')

	<div class="section no-pad-bot" id="index-banner">
	    <div class="container">

	      <h2 class="header center green-text text-darken-3">CTFlor Cadastre-se Agora!</h2>

				<div class="row center">
		        <h5 class="header col s12 light"> Congresso de Ciência e Tecnologia Florestal </h5>
						<h5 class="header col s12 light"> IV Simpósio de Meio Ambiente e Tecnologia Florestal </h5>
						<h5 class="header col s12 light"> 21, 22 e 23 de Maio </h5>
	      </div>

			</div>
  </div>

	<div class="container">
    	<div class="section">
    		@include('templates.partials.alerts')

      		<div class="row">
							<div class="card card-panel">
            			<form class="col s8" action="{{ route('home') }}" method="POST">
				        			<div class="row">
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

					                	<div class="input-field col s8">
											<button class="waves-effect waves-light btn" type="submit">Sign In</button>
										</div>
										<input type="hidden" name="_token" value="{{Session::token()}}">
				       	 	  </div>
		             </form>
							</div>
          	</div>
    	</div>
  	</div>
@stop