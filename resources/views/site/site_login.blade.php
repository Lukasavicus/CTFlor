@extends('site.templates.site_default_login')
@section('content')

        <div  id="cadastro" class=row>
        <div class="col s8">
					<div class="container">
							<h5> Cadastre-se na nossa plataforma agora mesmo!</h5>
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
													<div class="input-field col s4">
														<select id="type_" name="type">
																<option value="" selected="false">Escolha uma opcao</option>
																<option id="student" value="student">Estudante</option>
																<option id="professor" value="professor">Professor</option>
																<option id="community" value="community">Comunidade</option>
														</select>
														<label>Tipo de usuário</label>
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



													<div class="input-field col s4">
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
								<h5> Gerencie sua inscricao</h5>
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

 <script>
     $(document).ready(function() {
       $('select').material_select();
       $(".button-collapse").sideNav();

        new scrollReveal();
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
           $('.hide-dep').hide();

         }
      });

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
@stop
