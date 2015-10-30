@extends('templates.default')
@section('content')
	<div class="container">
    <div class="section">

      <div class="row">
	    <form class="col s8" action="{{ route('home') }}" method="POST">
	      	<div class="row">
		        <div class="input-field col s8">
		       		<input id="first_name2" type="text" class="validate">
 		 			<label class="active" for="first_name2">Login</label>
		        </div>
		        <div class="input-field col s8">
		        	<input id="password" type="password" class="validate">
	            	<label for="password">Password</label>
		        </div>
	      	</div>
	      	<div class="form-group">
				<button class="waves-effect waves-light btn" type="submit">Sign In</button>
			</div>
			<input type="hidden" name="_token" value="{{Session::token()}}">
	    </form>
	  </div>
    </div>
  </div>
@stop