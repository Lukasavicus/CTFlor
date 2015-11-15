@extends('site.templates.site_default')
@section('content')

    <div class="row">
        <form class="col s12" method="POST" action="#">

            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">perm_identity</i>
                    <input id="name_" name="name" type="text" class="validate">
                    <label for="name" id="lName" name="lName">Nome</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">credit_card</i>
                    <input id="cpf_" name="cpf" type="text" class="validate">
                    <label for="cpf" id="lCpf" name="lCpf">CPF</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">email</i>
                    <input id="email_" name="email" type="email" class="validate">
                    <label for="email" id="lEmail" name="lEmail">Email</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix">phone</i>
                    <input id="phone_" name="phone" type="text" class="validate">
                    <label for="phone" id="lPhone" name="lPhone">Telefone</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">location_on</i>
                    <input id="address_" name="address" type="text" class="validate">
                    <label for="address" id="lAddress" name="lAddress">Endereco</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">lock</i>
                    <input id="password_" name="password" type="password" class="validate">
                    <label class="active" for="password" id="lPassword" name="lPassword">Senha</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s4">
                    <select id="type_" name="type">
                        <option value="" disabled selected>Escolha uma opcao</option>
                        <option value="student">Estudante</option>
                        <option value="professor">Professor</option>
                        <option value="community">Comunidade</option>
                        <option value="organization">Organização</option>
                    </select>
                    <label>Tipo de usuario</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">store</i>
                    <input id="university_" name="university" type="text" class="validate">
                    <label for="university" id="lUniversity" name="lUniversity">Universidade</label>
                </div>

                <div class="input-field col s4">
                    <i class="material-icons prefix">assignment</i>
                    <input id="course_" name="course" type="text" class="validate">
                    <label class="active" for="course" id="lCourse" name="lCourse">Curso</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">work</i>
                    <input id="department_" name="department" type="text" class="validate">
                    <label for="department" id="lDepartment" name="lDepartment">Departamento</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">supervisor_account</i>
                    <input id="responsability_" name="responsability" type="text" class="validate">
                    <label for="responsability" id="lResponsability" name="lResponsability">Responsabilidade</label>
                </div>

            </div>



            <div class="row">
                <div class="input-field col s3">
                    <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">input</i>Inserir</button>
                </div>

                <div class="input-field col s3">
                    <a href="#!" class="waves-effect waves-light btn" id="clearButton_" name="clearButton"><i class="material-icons left">delete</i>Limpar</a>
                </div>
            </div>

            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

        </form>
    </div>
@stop
