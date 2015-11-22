@extends('site.templates.site_default')
@section('content')

	<div class="container">
    	<div class="section">
		    	@include('templates.partials.alerts')
					<div class="row">
				          <div class="card">
					            <div class="card-image">
					              <img src="images/ufscarLarge.jpg" style="width:1010px;height:300px;">
					              <span class="card-title">UFSCar Sorocaba</span>
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

					<div class="row">
							<div class="card">
									<iframe src="https://goo.gl/ZhUSMq" width="100%" height="60%"></iframe>
									<div class="card-content">
									<span class="card-title black-text"> Mapa do Local</span>
					          <p>
											O campus Sorocaba da UFSCar, localizado no km 100 da rodovia João Leme dos Santos (SP-264), tem cerca de 700 mil m².
											O espaço é composto por edifícios de atendimento à gestão Acadêmica e gestão administrativa da instituição.
											São 14 salas de aula e 10 laboratórios, entre didáticos e de informática.
											O campus é dotado também de Restaurante Universitário e Biblioteca.
											Toda a estrutura física do campus, assim como todas os projetos pedagógicos dos cursos oferecidos na unidade, é regida pelos princípios da sustentabilidade.
										</p>
					        </div>
					        <div class="card-action">
					    			<a href="http://www.sorocaba.ufscar.br/ufscar/index.php" target="_blank">UFSCar Sorocaba</a>
					        </div>
				      </div>

				  </div>

			</div>
	</div>
@stop
</script>
