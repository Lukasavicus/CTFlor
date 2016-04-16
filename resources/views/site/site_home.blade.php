@extends('site.templates.site_default')
@section('content')
			<!-- Page Content goes here -->

<<<<<<< HEAD
					    <!-- Pagina principal com o logo e informacao do evento -->
						<div class="row no-margin-bottom">
							<div id="intro" class="full-height full-width">
								 <div  class="col s12 full-height text-center intro-cover">
											<img class="responsive-img animated tada " id="ctflor-logo" src="../images/CTFlorfaixa.jpg"/>
								</div>
							</div>
						</div>

						<div class="row no-margin-bottom">
						 <div id="event" class="full-height full-width">
								<div class="col s6">
										 <h3 class="animated bounce">CTFlor - SIMATEF</h3>
										 <p  class="flow-text paragraph-fsize"> O Congresso de Engenharia Florestal e IV Simpósio de Meio Ambiente e
												Tecnologia Florestal serão realizados nos dias 21, 22 e 23 de maio, sendo um evento
												promovido pela Ecoflorestal Jr. Empresa e Consultoria Florestal, formada por alunos
												do curso de Engenharia Florestal da Universidade Federal de São Carlos - Campus Sorocaba.
												O evento reunirá estudantes universitários de diversas universidades do Brasil e do mundo,
												professores e profissionais do setor florestal brasileiro e internacional para discutir temas
												como Silvicultura, Fontes Renováveis, Legislação Florestal, Restauração Florestal, Manejo,
												Produção, Desmatamento entre outros diversos assuntos ligados ao nosso âmbito de
												pesquisa, estudo e trabalho.. Além de palestras o evento incluirá apresentações orais e de
											</p>
								</div>


							<div class="col s6  no-margin-bottom">
									<div class="photo" id="img-first" >
										 <img class="responsive-img"  src="../images/photo1.png"/>
									</div>
									<div class="photo" id="img-second">
										 <img class="responsive-img"  src="../images/photo4.png"/>
									</div>
									<div class="photo" id="img-third">
										 <img class="responsive-img"  src="../images/photo6.png"/>

									</div>
							</div>
						 </div>
						</div>




<!--

						<div class="row no-margin-bottom">
						 <div id="palestrantes" class="full-height full-width">
							 <div id="palestrantes-titulo-id"class="row">
								 <div class="col s12">
									 <h2 class="text-center">Palestrantes</h2>
								 </div>
							 </div>

						 		<div class="row">
									<div class="col s6">
										<div class="col s6">
										 	<img class="responsive-img image-circle" id="ctflor-logo" src="../images/marcela.jpg"/>
									  </div>
										<div class="col s6">
										 	<span class="texto-palestrante">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus, libero id molestie tincidunt, arcu eros aliquet lacus, at efficitur massa tortor sed libero. Proin hendrerit erat ex, et dictum sapien volutpat sed. Fusce in tincidunt quam.
										 	</span>
									  </div>
									</div>

									<div class="col s6">
										<div class="col s6">
										 	<img class="responsive-img image-circle" id="ctflor-logo" src="../images/forrest.jpg"/>
									  </div>
										<div class="col s6">
										 	<span class="texto-palestrante">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus, libero id molestie tincidunt, arcu eros aliquet lacus, at efficitur massa tortor sed libero. Proin hendrerit erat ex, et dictum sapien volutpat sed. Fusce in tincidunt quam.
										 	</span>
									  </div>
									</div>
								</div>
								<div class="row">
									<div class="col s6">
										<div class="col s6">
											<img class="responsive-img image-circle" id="ctflor-logo" src="../images/marcela.jpg"/>
										</div>
										<div class="col s6">
											<span class="texto-palestrante">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus, libero id molestie tincidunt, arcu eros aliquet lacus, at efficitur massa tortor sed libero. Proin hendrerit erat ex, et dictum sapien volutpat sed. Fusce in tincidunt quam.
											</span>
										</div>
									</div>

									<div class="col s6">
										<div class="col s6">
											<img class="responsive-img image-circle" id="ctflor-logo" src="../images/forrest.jpg"/>
										</div>
										<div class="col s6">
											<span class="texto-palestrante">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus, libero id molestie tincidunt, arcu eros aliquet lacus, at efficitur massa tortor sed libero. Proin hendrerit erat ex, et dictum sapien volutpat sed. Fusce in tincidunt quam.
											</span>
										</div>
									</div>
								</div>

						 </div>
						</div>
-->


	<div id="submission" class="container scrollspy">

		<div class="card">
			<div class="card-content">
					<span class="card-title black-text"> Submissões </span>
					<h4>
						Para realizar a submissão do seu trabalho, é obrigatória a inscrição no evento!
					</h4>
					<br />
					<p>
						<b>Observação 1:</b> Os trabalhos aprovados pela Comissão Científica do CTFlor e pela assessoria da Revista Pesquisa Agropecuária Tropical farão parte de um número especial do periódico.
					</p>
					<br />
					<p>
						<b>Observação 2:</b> Neste formato os trabalhos podem ser apresentados ou em forma de de banner, ou apresentação oral. Favor enviar interesse na hora de submeter o trabalho.
					</p>
			</div>

			<div class="card-action">
				<a href="files/report.docx" target="_blank">Modelo Relatório</a>
				<a href="files/presentation.pptx" target="_blank">Modelo Apresentação</a>
			</div>
		</div>
	</div>


	<div id="location" class="container scrollspy">

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


	<div id="organization" class="container scrollspy">
			<div class="row" align="center">

				<h3> Organização </h3>
					<table class="responsive-table">
					  	<tr>
					  	    <td><b>Realização:</b></td>
					  	    <td> <a href="http://www.ufscar.br/" title="UFSCar" target="_blank"> <img src="images/ufscarLogo.png" alt="UFSCar" width="150" height="80" border="0" /> </a> </td>
					        <td> <a href="https://www.facebook.com/Ecoflorestaljr/" title="EcoFlorestalJR" target="_blank"> <img src="images/ecoFlorestalLogo.png" alt="EcoFlorestalJR" width="150" height="80" border="0" /> </a> </td> </tr>
				       	<tr>

				       	<tr>
				          	<td><b>Apoio:</b></td>
				          	<td> <a href="http://www.cnpq.br/" title="CNPQ" target="_blank" class="lk_img"> <img src="images/cnpq.png" alt="CNPQ" width="120" height="36" border="0" /> </a> </td>
				          	<td> <a href="http://www.sebrae.com.br/" title="BioMassa" target="_blank" class="lk_img"> <img src="images/grupoPesquisaLogo.png" alt="BioMassa" width="100" height="60" border="0" /> </a> </td> </tr>
					    </tr>

					    <tr>
				          	<td><b>Patrocínio</b></td>

				          	<td> <a href="http://www.newholland.com/Pages/index.html" title="New Holland" target="_blank" class="lk_img"> <img src="images/newHollandLogo.png" alt="New Holland" width="120" height="57" border="0" /> </a> </td>
				          	<td> <a href="http://www.celmarmoveis.com.br/" title="Celmar" target="_blank" class="lk_img"> <img src="images/celmar.png" alt="Celmar" width="140" height="51" border="0" /> </a> </td>
				          	<td> <a href="http://www.aguaklarina.com.br/" title="Klarina" target="_blank" class="lk_img"> <img src="images/klarinaLogo.png" alt="Klarina" width="120" height="41" border="0" /> </a> </td>
				          	<td> <a href="http://www.syngenta.com/global/corporate/en/Pages/home.aspx" title="Syngenta" target="_blank" class="lk_img"> <img src="images/syngentaLogo.png" alt="Syngenta" width="110" height="80" border="0" /> </a> </td> </tr>
				        </tr>
				    </table>
			</div>
	</div>
				<script>
			    $(document).ready(function()
			    {
					$(".button-collapse").sideNav();


           			$("#type_").on("change",function()
           			{
		           		if($(this).val()== 'professor')
		           		{
							$('.hide-curso').hide();
							$('.hide-dep').show();
								}

						if($(this).val()== 'student')
						{

							$('.hide-dep').hide();
							$('.hide-curso').show();
						}
					});


					$("#cpf_").blur(function(){
						TestaCPF($this.val());
					});

					$("#password_1").blur(function(){
						if($(this).val() != document.getElementById("password_").value){
						}
					});

			      	$('select').material_select();

			    });

			    function clear()
			    {
			      document.getElementById("name_").value =  "";

			      document.getElementById("cpf_").value = "";

			      document.getElementById("email_").value = "";

			      document.getElementById("phone_").value = "";

			      document.getElementById("address_").value = "";

			      document.getElementById("type_").value = "";

			      document.getElementById("university_").value = "";

			      document.getElementById("course_").value = "";

			      document.getElementById("department_").value = "";

			      document.getElementById("responsability_").value = "";
			    }

				function TestaCPF(strCPF)
				{
					var Soma;
					var Resto;
					Soma = 0;

					if (strCPF == "00000000000")
						return false;

					for (i=1; i<=9; i++)
						Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);

					Resto = (Soma * 10) % 11;

					if ((Resto == 10) || (Resto == 11))
						Resto = 0;

					if (Resto != parseInt(strCPF.substring(9, 10)) )
						return false;

					Soma = 0;

					for (i = 1; i <= 10; i++)
						Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);

					Resto = (Soma * 10) % 11;

					if ((Resto == 10) || (Resto == 11))
						Resto = 0;

					if (Resto != parseInt(strCPF.substring(10, 11) ) )
						return false;


					return true;

				}

			</script>



@stop
