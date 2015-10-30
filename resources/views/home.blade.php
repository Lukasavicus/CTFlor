@extends('templates.default')
@section('content')
	<div class="container">
    <div class="section">

      <div class="row">
	    <form class="col s8" action="{{ route('home') }}" method="POST">
	      	<div class="row">
		        <div class="input-field col s8">
		       		<input name="login" id="login" type="text" class="validate">
 		 			<label class="active" for="login">Login</label>
 		 			@if($errors->has('login'))
 		 				<span>{{ $errors->first('login') }}</span>
 		 			@endif
		        </div>
		        <div class="input-field col s8">
		        	<input name="password" id="password" type="password" class="validate">
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