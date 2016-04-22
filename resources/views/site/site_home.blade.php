@extends('site.templates.site_default')
@section('content')
			<!-- Page Content goes here -->
<div class="container-fluid">
					    <!-- Pagina principal com o logo e informacao do evento -->
					<div id="intro" class="section scrollspy no-padding">
					 	<div class="container-fluid animate bounc">
								<div class="row no-margin-bottom">
										 <div  class="col l12 m12 s12 full-height text-center intro-cover">
														<img class="center responsive-img  " id="ctflor-logo" src="../images/CTFlorfaixa.jpg"/>
										 </div>
								</div>
						</div>
					</div>


						<div id="event" class="section scrollspy no-padding">
							 <div class="container-fluid side-padding">
									<div  class="row no-margin-bottom">


											<div class="col l6 m6 s12">
													 <h3 id="element-to-animate" class="animated text-center">CTFlor - SIMATEF</h3>
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


										<div class="col l6 m6 s12  text-center no-margin-bottom">
											 <div class="container-fluid animated slideInRight">
														<div class=" photo " id="img-first" >
															 <img class="responsive-img "  src="../images/photo1.png"/>
														</div>
											 </div>

											 <div class="container-fluid animated slideInRight">
														<div class="photo" id="img-second">
															 <img class="responsive-img"  src="../images/photo4.png"/>
														</div>
										  </div>
											<div class="container-fluid animated slideInRight">
														<div class="photo" id="img-third">
															 <img class="responsive-img"  src="../images/photo6.png"/>
														</div>
											</div>
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
				<div id="submissao" class="section scrollspy no-padding">
					<div class="row side-padding">
						<h3 class="text-center black-text">Submissões </h3>

						<div class="col l8">
								<table>
									<tbody>
										<tr>
											<td class="td-numbe"><i class="large material-icons">perm_identity</i></td>
											<td class="text-center">Inscreva - se no Evento e efetue seu pagamento. </td>
										</tr>
										<tr>
											<td class="td-numbe"><i class="large material-icons">library_add</i></td>
											<td class="text-center">Submeta seu trabalho no site e aguarde avaliação.</td>

										</tr>
										<tr>
											<td class="td-number"><i class="large material-icons">assignment</i></td>
											<td class="text-center">Os trabalhos podem ser apresentados
												 ou em forma de de banner, ou apresentação oral. Favor enviar interesse na hora de submeter o trabalho.
											</td>
										</tr>
										<tr>
											<td class="td-number"><i class="large material-icons">thumbs_up_down</i></td>
											<td class="text-center">Seu trabalho será avaliado por uma banca que irá lhe notificar
											um parecer por email.
											</td>

										</tr>

									</tbody>
								</table>

								</div>

						<div class="col l4">
								<div class="row">
									 <div class="col s12">
										 <div class="card small green-ctflor ">
											 <div class="card-content white-text">
												 <span class="card-title">Formato</span>
												 <p>É aconselhavel que sejam seguidos os modelos de apresentação e relatório.
												 Os arquivos estão disponíveis para download no link abaixo</p>
											 </div>
											 <div class="card-action">
												 <a href="files/report.docx" target="_blank">Modelo Relatório</a>
													<a href="files/presentation.pptx" target="_blank">Modelo Apresentação</a>
											 </div>
										 </div>
									 </div>
					     </div>
							 <div class="row">
								 <div class="col s12 m12 l12">
										 <div class="card-panel green-ctflor">
												 <span class="white-text">Os trabalhos aprovados pela Comissão Científica do CTFlor
															 e pela assessoria da Revista Pesquisa Agropecuária Tropical
															 farão parte de um número especial do periódico.
												 </span>
										 </div>
								 </div>
							</div>

				</div>
			</div>
		</div>

			<div id="location" class="section scrollspy row no-margin-bottom no-padding">
		               <div  class=" location-cover full-height full-width">
										   <h3 id="p-location" class="text-center">Local</h3>
		                <div class="col l6 m6 s12">
											<div class="valign-wrapper">
		                     <p id="p-location"class=" valign flow-text paragraph-fsize">O campus Sorocaba da UFSCar, localizado no km 100 da rodovia João Leme dos Santos (SP-264), tem cerca de 700 mil m². O espaço é composto por edifícios de atendimento à gestão Acadêmica e gestão administrativa da instituição. São 14 salas de aula e 10 laboratórios, entre didáticos e de informática. O campus é dotado também de Restaurante Universitário e Biblioteca. Toda a estrutura física do campus, assim como todas os projetos pedagógicos dos cursos oferecidos na unidade, é regida pelos princípios da sustentabilidade.
		                      </p>
										 </div>
		                </div>


		                <div class="col l6 m6 s12">
		                       <div id="map-container" class="responsive-img " >
		                        <iframe src="https://goo.gl/ZhUSMq" width="100%" ></iframe>
		                       </div>
		                </div>
		              </div>
		  </div>


			<div id="organization" class="section scrollspy no-padding">
			    <div class="row center" >
			      <h3 class="text-center"> Organização </h3>
						<br/>
			            <div class="row">
			                <div class="col l4 m4 s12 "><b><h5 >Realização:</h5></b></div>
			                <div class="col l4 m4 s12 "> <a href="http://www.ufscar.br/" title="UFSCar" target="_blank"> <img src="images/ufscarLogo.png" alt="UFSCar" width="150" height="80" border="0" /> </a> </div>
			                <div class="col l4 m4 s12 "> <a href="https://www.facebook.com/Ecoflorestaljr/" title="EcoFlorestalJR" target="_blank"> <img src="images/ecoFlorestalLogo.png" alt="EcoFlorestalJR" width="150" height="80" border="0" /> </a> </div>
			            </div>

			              <div class="row">
			                  <div class="col l4 m4 s12 "><b><h5>Apoio:</h5></b></div>
			                  <div class="col l4 m4 s12 "> <a href="http://www.cnpq.br/" title="CNPQ" target="_blank" class="lk_img"> <img src="images/cnpq.png" alt="CNPQ" width="120" height="36" border="0" /> </a> </div>
			                  <div class="col l4 m4 s12 "> <a href="http://www.sebrae.com.br/" title="BioMassa" target="_blank" class="lk_img"> <img src="images/grupoPesquisaLogo.png" alt="BioMassa" width="100" height="60" border="0" /> </a> </div>
			              </div>

			              <div class="row">
			                  <div class="col l4 m4 s12 "><b><h5>Patrocínio</h5></b></div>
			                  <div class="col l4 m4 s12 "> <a href="http://www.newholland.com/Pages/index.html" title="New Holland" target="_blank" class="lk_img"> <img src="images/newHollandLogo.png" alt="New Holland" width="120" height="57" border="0" /> </a> </div>
			                  <div class="col l4 m4 s12 "> <a href="http://www.celmarmoveis.com.br/" title="Celmar" target="_blank" class="lk_img"> <img src="images/celmar.png" alt="Celmar" width="140" height="51" border="0" /> </a> </div>
			              </div>

			        </div>

			  </div>
			</div>
	</div>
				<script>
			    $(document).ready(function(){
					$(".button-collapse").sideNav();
					$('.scrollspy').scrollSpy();
					// hide our element on page load
						/* $('#element-to-animate').css('opacity', 0);

						 $('#element-to-animate').waypoint(function() {
								 $('#element-to-animate').addClass('fadeInLeft');
						 }, { offset: '50%' });
*/

							var options = [
								{selector: '#image-test', offset: 50, callback: function() {
									Materialize.fadeInImage("#ctflor-logo");
								} }
							];
							Materialize.scrollFire(options);

					});

			</script>



@stop
