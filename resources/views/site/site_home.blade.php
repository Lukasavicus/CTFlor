@extends('site.templates.site_default')
@section('content')

	<div class="container">
    	<div class="section">

    		@include('templates.partials.alerts')

      	<div class="row col s12">

					<div class="slider">
				    <ul class="slides">

							<li>
				        <img src="images/photo1.png"> <!-- random image -->
				        <div class="caption right-align">
				          <h3>Mesa Redonda</h3>
				          <h5 class="light grey-text text-lighten-3">Momento para tirar as dúvidas com os palestrantes.</h5>
				        </div>
				      </li>

							<li>
				        <img src="images/photo2.png"> <!-- random image -->
				        <div class="caption left-align">
				          <h3>Palestrante da Universidade de Weissbeir</h3>
				          <h5 class="light grey-text text-lighten-3">Momento da apresentação</h5>
				        </div>
				      </li>

							<li>
				        <img src="images/photo3.png"> <!-- random image -->
				        <div class="caption right-align">
				          <h3>Right Aligned Caption</h3>
				          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				        </div>
				      </li>

				      <li>
				        <img src="images/photo4.png"> <!-- random image -->
				        <div class="caption center-align">
				          <h3>This is our big Tagline!</h3>
				          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				        </div>
				      </li>

							<li>
								<img src="images/photo5.png"> <!-- random image -->
								<div class="caption center-align">
									<h3>This is our big Tagline!</h3>
									<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
								</div>
							</li>

							<li>
				        <img src="images/photo6.png"> <!-- random image -->
				        <div class="caption center-align">
				          <h3>This is our big Tagline!</h3>
				          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
				        </div>
				      </li>


				    </ul>
				  </div>


				</div>

 	 			<div class="row">
	   	 			<div class="card">

								<div class="card-image">
									  <img src="images/CTFlor1.jpg" style="width:1000px;height:200px;">
									  <!-- <span class="card-title">CTFlor - 2015</span> -->
					    	</div>

						    <div class="card-content">
											<p>
												A formação do Engenheiro Florestal envolve diversos campos de atuação.
												Da área de ciências básicas vêm os conhecimentos sobre mecânica, genética,
												bioquímica entre outros que permitem ao futuro profissional desenvolver tecnologias e
												produtos aplicados ao meio ambiente e à sua conservação. Para isto, contribuem
												também os conhecimentos advindos das ciências biológicas com a consolidação das bases
												necessárias para manejar, conservar e prevenir problemas ambientais, propondo soluções
												sustentáveis econômica, ecológica e socialmente ajustadas à nova realidade do século 21.
											</p>
						    </div>
					  </div>
				</div>

    	</div>
  	</div>

		<script>
		$(document).ready(function(){
      $('.slider').slider({
				full_width: false,
				interval: 2000
			});
    });
		</script>


@stop
