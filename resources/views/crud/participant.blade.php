@extends('templates.default_crud')

@section('subheader')
    <br><br>
        <h1 class="header center green-text text-darken-3">Participants' Page</h1>
        <div class="row center">
          <h5 class="header col s12 light">You can create, recovery, update and delete</h5>
        </div>
    <br><br>
@stop


@section('search')
    <div class="row">
        <div class="card card-panel">
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
                <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
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
    </div>
@stop

@section('fields')
    <div class="row">
        <div class="card card-panel">
            @if($errors->any())
                <div class="card-panel red waves-effect waves-light" role="alert">
                    <p>
                    @foreach($errors->all() as $error)
                      {{ $error }}
                    @endforeach
                    </p>
                </div>
            @endif
            <form class="col s12" method="POST" action="{{ route('crud.participant') }}">

                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="name_" name="name" type="text" class="validate">
                        <label id="lname" for="name">Nome</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">credit_card</i>
                        <input id="cpf_" name="cpf" type="text" class="validate">
                        <label id="lcpf" for="cpf">CPF</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">email</i>
                        <input id="email_" name="email" type="email" class="validate">
                        <label id="lemail" for="email">Email</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone_" name="phone" type="text" class="validate">
                        <label id="lphone" for="phone">Telefone</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">location_on</i>
                        <input id="address_" name="address" type="text" class="validate">
                        <label id="laddress" for="address">Endereco</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">lock</i>
                        <input id="password_" name="password" type="password" class="validate">
                        <label id="lpassword" for="password">Senha</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s4">
                        <select id="type_" name="type">
                            <option value="" selected="false">Escolha uma opcao</option>
                            <option id="student" value="student">Estudante</option>
                            <option id="professor" value="professor">Professor</option>
                            <option id="community" value="community">Comunidade</option>
                            <option id="organization" value="organization">Organização</option>
                        </select>
                        <label>Tipo de usuario</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">store</i>
                        <input id="university_" name="university" type="text" class="validate">
                        <label id="luniversity" for="university">Universidade</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">assignment</i>
                        <input id="course_" name="course" type="text" class="validate">
                        <label id="lcourse" for="course">Curso</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">work</i>
                        <input id="department_" name="department" type="text" class="validate">
                        <label id="ldepartment" for="department">Departamento</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">supervisor_account</i>
                        <input id="responsability_" name="responsability" type="text" class="validate">
                        <label id="lresponsability" for="responsability">Responsabilidade</label>
                    </div>

                </div>



                <div class="row">

                    <div class="input-field col s3">
                        <button type="submit" class="waves-effect waves-light btn">
                          <i class="material-icons left">input</i>
                          Inserir
                        </button>
                    </div>

                    <div class="input-field col s3">
                      <button id="clearButton_" name="clearButton" class="waves-effect waves-light btn" type="reset" >
                        <i class="material-icons left">delete</i>
                        Clear Fields
                      </button>
                    </div>

                </div>

                <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

            </form>
        </div>
    </div>
@stop

@section('elements')
    <div class="row">
        <div class="card card-panel">
            @if($participants == null || $participants->count() == 0)
                <div class="card-panel red waves-effect waves-light" role="alert">
                    "Nenhum Participante foi cadastrado ainda."
                </div>
            @else
                <table class="responsive-table">
                    @foreach($participants as $participant)
                        <tr>

                                <td>
                                    <i class="material-icons left">perm_identity</i>
                                    <span id="nameSearch" name="nameSearch">{{ $participant->name }}</span>
                                </td>


                                <td>
                                    <i class="tiny material-icons left">credit_card</i>
                                    <span id="cpfSearch" name="cpfSearch">{{ $participant->cpf }}</span>
                                </td>
                                <?php
                                  $participantString = $participant->name . "?" . $participant->cpf . "?" . $participant->email . "?" .
                                                       $participant->phone . "?" . $participant->address . "?" . $participant->type . "?" .
                                                       $participant->university . "?" . $participant->course . "?" . $participant->department . "?" .
                                                       $participant->responsability ;
                                ?>
                                <td>
                                    <button class="waves-effect waves-light btn" onclick="edit('{{ $participantString }}');">
                                        <i class="material-icons left">info_outline</i>Edit
                                    </button>
                                </td>


                                <td>
                                    <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $participant->name }}');">
                                        <i class="material-icons left">delete</i>Delete
                                    </a>
                                </td>
                        </tr>
                    @endforeach
                </table>
          @endif
        </div>
    </div>
@stop

<script type="text/javascript">
    window.onload = function() {
        document.formHeader.action = "{{ route('crud.participant.delete') }}";
    }
</script>

<script type="text/javascript">

    function edit( myParticipantString ) {

      //alert(myParticipantString);

      var split = myParticipantString.split('?');

      document.getElementById("name_").value =  split[0];
      document.getElementById("lname").className += " active";

      document.getElementById("cpf_").value = split[1];
      document.getElementById("lcpf").className += " active";

      document.getElementById("email_").value = split[2];
      document.getElementById("lemail").className += " active";

      document.getElementById("phone_").value = split[3];
      document.getElementById("lphone").className += " active";

      document.getElementById("address_").value = split[4];
      document.getElementById("laddress").className += " active";

      document.getElementById(split[5]).selected = true;

      document.getElementById("university_").value = split[6];
      document.getElementById("luniversity").className += " active";

      document.getElementById("course_").value = split[7];
      document.getElementById("lcourse").className += " active";

      document.getElementById("department_").value = split[8];
      document.getElementById("ldepartment").className += " active";

      document.getElementById("responsability_").value = split[9];
      document.getElementById("lresponsability").className += " active";
    }

</script>
