@extends('templates.default')

@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center green-text text-darken-3">INSC!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Subscribing</h5>
      </div>
      <br><br>

	@include('templates.partials.alerts')

    </div>
  </div>

<div class="container">
    <div class="section">
		@yield('informations')
	</div>
</div>

<div class="col s6">
  <table class="highlight">
  	@yield('tableWithAll1')
  </table>
</div>

<div class="col s6">
  <table class="highlight">
  	@yield('tableWithSelected1')
  </table>
</div>

<div class="col s6">
  <table class="highlight">
  	@yield('tableWithAll2')
  </table>
</div>

<div class="col s6">
  <table class="highlight">
  	@yield('tableWithSelected2')
  </table>
</div>

<div class="container">
    <div class="section">
		@yield('options')
	</div>
</div>	

@stop