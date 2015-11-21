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

	@include('templates.partials.alerts')

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
