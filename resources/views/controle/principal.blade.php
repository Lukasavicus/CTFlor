@extends('templates.default')
@section('content')

	<div class="section no-pad-bot" id="index-banner">
	    <div class="container">
	      <br><br>
	      <h1 class="header center green-text text-darken-3">CTFlor Sistema Web</h1>
	      <div class="row center">
	        <h5 class="header col s12 light">Uma área para o encontro de pesquisadores e estudantes de Engenharia Florestal</h5>
	      </div>
	      <br><br>
	    </div>
  	</div>

	<div class="container">
    	<div class="section">

    		@include('templates.partials.alerts')

    		<div class="row">
		        <div class="col s12">
		          <div class="card green lighten-1">
		            <div class="card-content white-text">
		              <span class="card-title"><b>Palestras - Minicursos e Visitas Técnicas</b></span>
		              <p><b>Em breve maiores informações serão publicadas no seu mural, fique atento pois o CTFlor já começou!</b></p>
		            </div>
		            <div class="card-action">
		              <p>Visite a nossa página no <a class="blue-text text-darken-2" href="https://www.facebook.com/events/1742062519350334/" target="_blank">Facebook</a></p>
		            </div>
		          </div>
		        </div>
		    </div>
  
          	</div>
    	</div>
  	</div>
@stop
