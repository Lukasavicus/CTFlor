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

<div class="row">
  

    <div class="row">
      <div class="col s6">
        <table class="bordered highlight">
        	@yield('tableWithAll1')
        </table>
      </div>

      <div class="col s6">
        <table class="bordered highlight">
        	@yield('tableWithSelected1')
        </table>
      </div>
    </div>


    <div class="row">
      <div class="col s6">
        <table class="bordered highlight">
        	@yield('tableWithAll2')
        </table>
      </div>

      <div class="col s6">
        <table class="bordered highlight">
        	@yield('tableWithSelected2')
        </table>
      </div>
    </div>
  
</div>

<div class="container">
    <div class="section">
		  <div class="row">      
        <div class="input-field col s3">
            <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">input</i>Salvar</button>
        </div>
    </div>
	</div>
</div>	

@stop