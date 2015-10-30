@extends('templates.default')
@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center green-text text-darken-3">CRUD!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Create - Recovery - Update - Delete</h5>
      </div>
      <br><br>

	@if (Session::has('event'))
		<div class="card-panel lime waves-effect waves-light" role="alert">
			{{ Session::get('event') }}
		</div>
	@endif

	@if (Session::has('participant'))
		<div class="card-panel lime waves-effect waves-light" role="alert">
			{{ Session::get('participant') }}
		</div>
	@endif	

    </div>
  </div>

<div class="container">
    <div class="section">
@yield('search')
	</div>
</div>

<div class="container">
    <div class="section">
@yield('fields')
	</div>
</div>

<div class="container">
    <div class="section">
@yield('elements')
	</div>
</div>

@stop