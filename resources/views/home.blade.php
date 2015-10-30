@extends('templates.default')
@section('content')
	
	<div class="section no-pad-bot" id="index-banner">
	    <div class="container">
	      <br><br>
	      <h1 class="header center green-text text-darken-3">CTFlor Cadastre-se Agora!</h1>
	      <div class="row center">
	        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
	      </div>
	      <br><br>
	    </div>
  	</div>

	<div class="container">
    	<div class="section">
      		<div class="row">
            	<form class="col s8" action="{{ route('home') }}" method="POST">
        			<div class="row">
		                <div class="input-field col s8">
		                    <input id="login" name="name" type="text" class="validate"/>
		                    <label class="active" for="first_name2">Login</label>
		                </div>
	                	<div class="input-field col s8">
	                        <input id="password" name="password" type="password" class="validate"/>
	            			<label for="password">Password</label>
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
@stop