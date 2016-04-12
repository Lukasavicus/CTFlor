@extends('site.templates.site_default')
@section('content')

			<!-- Page Content goes here -->

					    <!-- Pagina principal com o logo e informacao do evento -->
						<div class="row no-margin-bottom">
							<div id="intro" class="full-height full-width">
								 <div class="col s12 full-height text-center intro-cover">
											<img class="responsive-img" id="ctflor-logo" src="../images/CTFlorfaixa.png"/>
								</div>
							</div>
						</div>

						<div class="row no-margin-bottom">
						 <div id="event" class="full-height full-width">
								<div class="col s6">
										 <h3>CTFlor - SIMATEF</h3>
										 <p  class="flow-text paragraph-fsize"> O Congresso de Ciência e Tecnologia Florestal e IV Simpósio de Meio Ambiente e
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
						 <div id="programacao" class="full-height full-width">
								<div class="col s6">

								</div>


							<div class="col s6  no-margin-bottom">

							</div>
						 </div>
						</div>
-->



					<div id="location" class="row no-margin-bottom">
						<div class="col s12 full-height text-center location-cover">

									<h3 id="p-location" class="text-center">Local</h3>
									 <div  class=" full-height full-width">
										<div class="col s6">

												 <p id="p-location"class="flow-text paragraph-fsize">O campus Sorocaba da UFSCar, localizado no km 100 da rodovia João Leme dos Santos (SP-264), tem cerca de 700 mil m². O espaço é composto por edifícios de atendimento à gestão Acadêmica e gestão administrativa da instituição. São 14 salas de aula e 10 laboratórios, entre didáticos e de informática. O campus é dotado também de Restaurante Universitário e Biblioteca. Toda a estrutura física do campus, assim como todas os projetos pedagógicos dos cursos oferecidos na unidade, é regida pelos princípios da sustentabilidade.
													</p>
										</div>


										<div class="col s6">
													 <div id="map-container" class="responsive-img" >
														<iframe src="https://goo.gl/ZhUSMq" width="100%" height="80%"></iframe>
													 </div>
										</div>
									</div>
						</div>
					</div>


        <div  id="cadastro" class=row>
        <div class="col s8">
					<div class="container">
							<h3> Cadastre-se na nossa plataforma agora mesmo!</h3>
							<br />
							<br />
							<div class="row">
									@if($errors->any())
											<div class="card-panel  red waves-effect waves-light" role="alert">
													@foreach($errors->all() as $error)
															<p>{{ $error }}</p>
													@endforeach
											</div>
									@endif


									<form class="col s12" method="POST" action="{{ route('crud.participant') }}">
										<input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
										<div class="row">

											<div class="card large card-panel">

												<script type="text/javascript">

													$(document).ready(function() {
												    	$('select').material_select();
													});
												</script>

												<div class="input-field col s4">
														<select id="type_" name="type">
																<option value="" selected="false">Escolha uma opcao</option>
																<option id="student" value="student">Estudante</option>
																<option id="professor" value="professor">Professor</option>
																<option id="community" value="community">Comunidade</option>
														</select>
														<label>Tipo de usuario</label>
												</div>

													<div class="input-field col s8">
															<i class="material-icons prefix">perm_identity</i>
															<input id="name_" name="name" type="text" class="validate">
															<label id="lname" for="name">Nome</label>
													</div>

													<div class="input-field col s4">
															<i class="material-icons prefix">credit_card</i>
															<input id="cpf_" name="cpf" type="text" class="validate">
															<label id="lcpf" for="cpf">CPF</label>
													</div>

													<div class="input-field col s8">
															<i class="material-icons prefix">email</i>
															<input id="email_" name="email" type="email" class="validate">
															<label id="lemail" for="email">Email</label>
													</div>

													<div class="input-field col s4">
															<i class="material-icons prefix">phone</i>
															<input id="phone_" name="phone" type="text" class="validate">
															<label id="lphone" for="phone">Telefone</label>
													</div>

													<div class="input-field col s8">
															<i class="material-icons prefix">location_on</i>
															<input id="address_" name="address" type="text" class="validate">
															<label id="laddress" for="address">Endereco</label>
													</div>

													<div class="input-field col s6">
															<i class="material-icons prefix">lock</i>
															<input id="password_" name="password" type="password" class="validate">
															<label id="lpassword" for="password">Senha</label>
													</div>

													<div class="input-field col s6">
															<i class="material-icons prefix">lock</i>
															<input id="password_1" name="password1" type="password" class="validate">
															<label id="lpassword1" for="password1">Confirmar Senha</label>
													</div>



													<div class="input-field col s6">
															<i class="material-icons prefix">store</i>
															<input id="university_" name="university" type="text" class="validate">
															<label id="luniversity" for="university">Universidade</label>
													</div>

													<div class=" hide-curso input-field col s6">
															<i class="material-icons prefix">assignment</i>
															<input id="course_" name="course" type="text" class="validate">
															<label id="lcourse" for="course">Curso</label>
													</div>

													<div class="hide-dep input-field col s6">
															<i class="material-icons prefix">work</i>
															<input id="department_" name="department" type="text" class="validate">
															<label id="ldepartment" for="department">Departamento</label>
													</div>



													<div class="input-field col s3">
															<button type="submit" class="waves-effect waves-light green darken-4 btn">
																<i class="material-icons left">input-field</i>
																Inscrever
															</button>
													</div>



												</div>
											</div>
								</form>
							</div>
					</div>






				</div>




				 <div class="col s4">
					<div class="container">
								@include('templates.partials.alerts')
								<h3> Gerencie sua inscricao</h3>
								<br />
								<br />
									<div class="row">
											<form class="col s12" action="{{ route('home') }}" method="POST">
													<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
													<div class="row">
														<div class="card card-content">
																	<div class="input-field col s8">
																			<i class="material-icons prefix">perm_identity</i>
																			<input id="cpf" name="cpf" type="text" class="validate"/>
																			<label class="active" for="cpf">CPF</label>
																			@if($errors->has('cpf'))
																				<span>{{ $errors->first('cpf') }}</span>
																			@endif
																	</div>
																	<div class="input-field col s8">
																			<i class="material-icons prefix">vpn_key</i>
																			<input id="password" name="password" type="password" class="validate"/>
																			<label for="password">Password</label>
																			@if($errors->has('password'))
																					<span>{{ $errors->first('password') }}</span>
																			@endif
																	</div>

																	<div class="card-action input-field col s8">
																		<button class="waves-effect waves-light green darken-4 btn" type="submit">Sign In</button>
																	</div>
														</div>
												</div>
											</form>
									</div>
							</div>
					</div>



				</div>

			</div>

			<script>
			    $(document).ready(function() {
           			$("#type_").on("change",function(){
             			
             			if($(this).val()== 'professor'){
						  	$('.hide-curso').hide();
							 $('.hide-dep').show();
						}
						
						if($(this).val()== 'student'){
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
					
					§return true; 
				}

			</script>

	</body>


@stop
