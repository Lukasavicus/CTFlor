@extends('templates.default')
@section('content')

	<div class="section no-pad-bot" id="index-banner">
	    <div class="container">
	      <br><br>
	      <h1 class="header center green-text text-darken-3">HASHING</h1>
	      <div class="row center">
	        <h5 class="header col s12 light">Input a CPF</h5>
	      </div>
	      <br><br>
	    </div>
  	</div>

	<div class="container">
    	<div class="section">

      		<div class="row">
            	<form class="col s8" action="{{route('senha')}}" method="POST">
                    <input id="cpf" name="cpf" type="text" class="validate">
	                	<div class="input-field col s8">
							<button class="waves-effect waves-light btn" type="submit">Sign In</button>
						</div>
						<input type="hidden" name="_token" value="{{Session::token()}}">
            	</form>
            	@if(Session::has('hashed'))
            		<input id="cpf_Hashed" name="cpf_Hashed" type="text" class="validate" value="{{ Session::get('hashed') }}">
        		@else
        			<input id="cpf_Hashed" name="cpf_Hashed" type="text" class="validate" value="nulo">
            	@endif
          	</div>
    	</div>
  	</div>
@stop