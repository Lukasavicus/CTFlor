@extends('templates.default_crud')

@section('search')
    <div class="row">
        <form class="col s12" action="{{ route('home') }}" method="POST">
        	<div class="input-field col s4 left-align">
                <p>
                    <input type="checkbox" id="name"/>
                    <label for="name">Nome</label>
                    <input type="checkbox" id="location"/>
                    <label for="location">Localizacao</label>
                    <input type="checkbox" id="type"/>
                    <label for="type">Tipo</label>
                </p>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
            	<input id="icon_search" type="text" class="validate">
                <label for="icon_search">Buscar</label>
            </div>
            <div class="input-field col s2 right-align">
                <button class="waves-effect waves-light btn" type="submit">Buscar</button>
            </div>
        </form>
    </div>
@stop

@section('fields')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('participant') }}">

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
                    <button type="submit" class="waves-effect waves-light btn">
                      <i class="material-icons left">input</i>
                      Inserir
                    </button>
                </div>

                <button id="clearButton_" name="clearButton" class="waves-effect waves-light btn" onclick="clear();" >
                  <i class="material-icons left">delete</i>
                  Limpar
                </button>

            </div>

            <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

        </form>
    </div>
@stop

@section('elements')

    @if($participants == null)
        <div class="card-panel red waves-effect waves-light" role="alert">
            "Nenhum Participante foi cadastrado ainda."
        </div>
    @else
        <ul class="collection">
        @foreach($participants as $participant)
            <li class="collection-item avatar">
                <div class="row col s12">
                    <i class="material-icons left">perm_identity</i>
                    <div class="col s3">
                        <span id="nameSearch" name="nameSearch">{{ $participant->name }}</span>
                    </div>

                    <i class="tiny material-icons left">credit_card</i>
                    <div class="col s3">
                        <span id="cpfSearch" name="cpfSearch">{{ $participant->cpf }}</span>
                    </div>
                    <?php
                      $participantString = $participant->name . "?" . $participant->cpf . "?" . $participant->email . "?" .
                                           $participant->phone . "?" . $participant->address . "?" . $participant->type . "?" .
                                           $participant->university . "?" . $participant->course . "?" . $participant->department . "?" .
                                           $participant->responsability ;
                    ?>
                    <button class="waves-effect waves-light btn" onclick="edit('{{ $participantString }}');" >
                      <i class="material-icons left">info_outline</i>
                      Edit
                    </button>

                    <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $participant->name }}');">
                      <i class="material-icons left">delete</i>
                      Delete
                    </a>

                </div>
            </li>
        @endforeach
        </ul>
    @endif
@stop

<script type="text/javascript">
    window.onload = function() {
        document.formHeader.action = "{{ route('participant.delete') }}";
    }

    function edit( myParticipantString )
    {

      var split = myParticipantString.split('?');

      document.getElementById("name_").value =  split[0];
      document.getElementById("lName").className += " active";

      document.getElementById("cpf_").value = split[1];
      document.getElementById("lCpf").className += " active";

      document.getElementById("email_").value = split[2];
      document.getElementById("lEmail").className += " active";

      document.getElementById("phone_").value = split[3];
      document.getElementById("lPhone").className += " active";

      document.getElementById("address_").value = split[4];
      document.getElementById("lAddress").className += " active";

      document.getElementById("type_").value = split[5];
      document.getElementById("lType").className += " active";

      document.getElementById("university_").value = split[6];
      document.getElementById("lUniversity").className += " active";

      document.getElementById("course_").value = split[7];
      document.getElementById("lCourse").className += " active";

      document.getElementById("department_").value = split[8];
      document.getElementById("lDepartment").className += " active";

      document.getElementById("responsability_").value = split[9];
      document.getElementById("lResponsability").className += " active";

    }

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



</script>
