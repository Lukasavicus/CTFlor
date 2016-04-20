@extends('site.templates.site_default_login')
@section('content')


        <div  id="cadastro" class=row>
            <div class="col s12">
    					<div class="container">

    							<div class="row">
                    <h4 class="text-center"> Inscreva-se no evento!</h4>
    									@if($errors->any())
    											<div id="erros" class="card-panel  red waves-effect waves-light" role="alert">
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
                                                        <span id="span-cpf" ></span>
    													<div class="input-field col s4">
    															<i class="material-icons prefix">credit_card</i>
    															<input id="cpf_" name="cpf" type="number" class="validate">
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


                                                          <script type="text/javascript">
                                                            $(document).ready(function(){
                                                                $('select').material_select();
                                                            });
                                                          </script>

                                                        <div class="input-field col s4">
                                                             <select id="type_" name="type">
                                                                <option value="" disabled selected>Escolha uma opcao</option>
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
                              <span id="span-password" ></span>
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

    													<div class="hide-dep input-field col s4">
    															<i class="material-icons prefix">work</i>
    															<input id="department_" name="department" type="text" class="validate">
    															<label id="ldepartment" for="department">Departamento</label>
    													</div>
    													<div class="input-field col s6 offset-s2">
                                                            <button id="incluir_alterar" type="submit" class="waves-effect green darken-4 waves-light btn-large">

                                                                  <i class="material-icons left">input</i>
                                                                      Inscrever-se
                                                            </button>
                                                        </div>
    											</div>
    										</div>
    								</form>
    							</div>
    					</div>
    				</div>


 </div>
  <script type="text/javascript" src="js/ownFunctions.js"></script>
  <script type="text/javascript">

        $('#cpf_').focusout(function() {

            console.log("Fired CPF function");

            var reg_exp = /^([0-9]{3,3})\.([0-9]{3,3})\.([0-9]{3,3})\-([0-9]{2,2})$/;

            if (reg_exp.exec($('#cpf_').val()) === null && $('#cpf_').val()) {
                $('#span-cpf').fadeIn(1000, function() {
                    $(this).html('Erro CPF:');
                });

                $('#span-cpf').fadeIn('slow', function() {
                    $(this).html('Informe um CPF válido.');
                });
            } else {
                $('#span-cpf').fadeOut(1000, function() {
                    $(this).html('');
                });
                $('#span-cpf').fadeOut(1000, function() {
                    $(this).html('');
                });
            }

        });

        $('#password_1').focusout(function() {
            if ($('#password_').val()!== $('#password_1').val()) {

                $('#span-password').fadeIn('slow', function() {
                    $(this).html('Senha e confirmação divergem.');
                });
            }
        });

        $('#type_').on('change', function(){
            if($('#type_').val() == "professor"){
                $(".hide-dep").show();
                $(".hide-curso").hide();
            }else if $('#type_').val() == "student"){
                $(".hide-curso").show();
                $(".hide-dep").hide();
            }else{
                $(".hide-curso").hide();
                  $(".hide-dep").hide();
            }
        });


  </script>

@stop
