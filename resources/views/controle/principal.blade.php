@extends('templates.default')
@section('content')
	
	<div class="section no-pad-bot" id="index-banner">
	    <div class="container">
	      <br><br>
	      <h1 class="header center green-text text-darken-3">CTFlor Control System</h1>
	      <div class="row center">
	        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
	      </div>
	      <br><br>
	    </div>
  	</div>

	<div class="container">
    	<div class="section">

    		@include('templates.partials.alerts')

      		<div class="row col s12">
    			<div class="row">
	                <div class="input-field col s4">
	                	<i class="material-icons prefix">perm_identity</i>
	                    <input id="cpf" name="cpf" type="text" class="validate" value="{{ Auth::user()['name']}}" disabled="true">
	                    <label class="active" for="cpf">Usuário</label>
	                </div>
   	 			</div>

	<!-- ================================================================================================ -->
   	 			<!-- ===================== -->

   	 			<div class="row col s4">
	   	 			<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
					    	<img class="activator" src="images/office.jpg">
					    </div>
					    <div class="card-content">
					    	<span class="card-title activator grey-text text-darken-4">Eventos<i class="material-icons right">more_vert</i></span>
					    	<p><a href="#">CRUD</a></p>
					    </div>
					    <div class="card-reveal">
					    	<span class="card-title grey-text text-darken-4">Eventos<i class="material-icons right">close</i></span>
					    	<p>Here is some more information about this product that is only revealed once clicked on.</p>
					 	</div>
					</div>
				</div>

   	 			<!-- +++++++++++++++++++++ -->

   	 			<!-- ===================== -->

   	 			<div class="row col s4">
	   	 			<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
					    	<img class="activator" src="images/parallax2.jpg">
					    </div>
					    <div class="card-content">
					    	<span class="card-title activator grey-text text-darken-4">Atividades<i class="material-icons right">more_vert</i></span>
					    	<p><a href="#">CRUD</a></p>
					    	<p><a href="#">Lista</a></p>
					    </div>
					    <div class="card-reveal">
					    	<span class="card-title grey-text text-darken-4">Atividades<i class="material-icons right">close</i></span>
					    	<p>Here is some more information about this product that is only revealed once clicked on.</p>
					 	</div>
					</div>
				</div>

   	 			<!-- +++++++++++++++++++++ -->

   	 			<!-- ===================== -->

   	 			<div class="row col s4">
	   	 			<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
					    	<img class="activator" src="images/parallax1.jpg">
					    </div>
					    <div class="card-content">
					    	<span class="card-title activator grey-text text-darken-4">Participantes<i class="material-icons right">more_vert</i></span>
					    	<p><a href="#">CRUD</a></p>
					    	<p><a href="#">Lista</a></p>
					    </div>
					    <div class="card-reveal">
					    	<span class="card-title grey-text text-darken-4">Participantes<i class="material-icons right">close</i></span>
					    	<p>Here is some more information about this product that is only revealed once clicked on.</p>
					 	</div>
					</div>
				</div>

   	 			<!-- +++++++++++++++++++++ -->
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

          	</div>
    	</div>
  	</div>
@stop