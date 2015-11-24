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
                  <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">
                  <div class="input-field col s4">
                       <p>
                         <input name="radioSearch" type="radio" id="nameSearch_" value="Name" />
                         <label for="nameSearch_">Name</label>

                         <input name="radioSearch" type="radio" id="locationSearch_" value="Location" />
                         <label for="locationSearch_">Location</label>

                         <input name="radioSearch" type="radio" id="typeSearch_" value="Tipe" />
                         <label for="typeSearch_">Type</label>
                       </p>
                   </div>
                   <div class="input-field col s6">
                       <i class="material-icons prefix">search</i>
                       <input name="valueSearch" id="icon_search" type="text" class="validate">
                       <label for="icon_search">Search</label>
                   </div>

                  <div class="input-field col s2">
                      <button class="waves-effect waves-light btn" type="submit">Search</button>
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

                    <div class="input-field" style="visibility:hidden">
                        <i class="material-icons prefix">toc</i>
                        <input id="id_" name="id" type="number" class="validate" value="-1">
                        <label id="lid" for="icon_prefix">ID:</label>
                    </div>

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
                            <option value="" selected="false">Choose your option</option>
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
                        <button id="incluir_alterar" type="submit" class="waves-effect waves-light btn">
                          <i class="material-icons left">input</i>
                          Insert
                        </button>
                    </div>

                    <div class="input-field col s3">
                      <button id="clearButton_" name="clearButton" class="waves-effect waves-light btn" type="reset" >
                        <i class="material-icons left">delete</i>
                        Clear Fields
                      </button>
                    </div>

                    <div id="cancelar" class="input-field col s3" style="visibility:hidden">
                        <button type="reset" class="waves-effect waves-light btn" onclick="cancelAll()">
                          <i class="material-icons left">info_outline</i>
                          Cancelar
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

          @if(isset($results))
                @if($results->count() == 0)
                    <div class="card-panel red waves-effect waves-light" role="alert">
                        "No particiapnt has been found."
                    </div>
                @else
                    <table class="responsive-table">
                    @foreach($results as $result)
                        <tr>
                            <td>
                                <i class="material-icons left">description</i> <span id="nameSearch" name="nameSearch">{{ $result->name }}</span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">description</i> <span id="typeSearch" name="typeSearch">{{ $result->cpf }} </span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">toc</i> <span id="typeSearch" name="typeSearch">{{ $result->email }} </span>
                            </td>

                            <td>
                                <i class="tiny material-icons left">room</i> <span id="typeSearch" name="typeSearch">{{ $result->location }} </span>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                @endif

            @else


            @if($participants == null || $participants->count() == 0)
                <div class="card-panel red waves-effect waves-light" role="alert"> "No participant has been registered yet."</div>
            @else
                <table class="responsive-table">
                    @foreach($participants as $participant)
                        <tr>
                                <td>
                                  <i class="material-icons left">perm_identity</i><span id="nameSearch" name="nameSearch">{{ $participant->name }}</span>
                                </td>


                                <td>
                                  <i class="tiny material-icons left">credit_card</i><span id="cpfSearch" name="cpfSearch">{{ $participant->cpf }}</span>
                                </td>
                                <?php
                                  $participantString = $participant->id . "?" . $participant->name . "?" . $participant->cpf . "?" . $participant->email . "?" .
                                                       $participant->phone . "?" . $participant->address . "?" . $participant->type . "?" .
                                                       $participant->university . "?" . $participant->course . "?" . $participant->department . "?" .
                                                       $participant->responsability ;
                                ?>
                                <td>
                                    <button class="waves-effect waves-light btn" onclick="edit('{{ $participantString }}');"><i class="material-icons left">info_outline</i>Edit</button>
                                </td>


                                <td>
                                    <a href="#modal1" class="waves-effect waves-light btn modal-trigger" onclick="modalSetText('{{ $participant->name }}');"><i class="material-icons left">delete</i>Delete</a>
                                </td>
                        </tr>
                    @endforeach
                </table>
            @endif
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

      document.getElementById("id_").value =  split[0];
      document.getElementById("lid").className += " active";

      document.getElementById("name_").value =  split[1];
      document.getElementById("lname").className += " active";

      document.getElementById("cpf_").value = split[2];
      document.getElementById("lcpf").className += " active";

      document.getElementById("email_").value = split[3];
      document.getElementById("lemail").className += " active";

      document.getElementById("phone_").value = split[4];
      document.getElementById("lphone").className += " active";

      document.getElementById("address_").value = split[5];
      document.getElementById("laddress").className += " active";

      //alert(split[6]);
      //document.getElementById(split[6]).selected = true;

      document.getElementById("university_").value = split[7];
      document.getElementById("luniversity").className += " active";

      document.getElementById("course_").value = split[8];
      document.getElementById("lcourse").className += " active";

      document.getElementById("department_").value = split[9];
      document.getElementById("ldepartment").className += " active";

      document.getElementById("responsability_").value = split[10];
      document.getElementById("lresponsability").className += " active";

      editMode();

    }

    function editMode(){
      document.getElementById("cancelar").setAttribute("style", "visibility:visible");
      document.getElementById("incluir_alterar").innerHTML = "<i class=\"material-icons left\">input</i> Alterar";
      document.getElementById("cpf_").readOnly  = true;
      document.getElementById("password_").readOnly  = true;
    }

    function cancelAll(){
      document.getElementById("cancelar").setAttribute("style", "visibility:hidden");
      document.getElementById("incluir_alterar").innerHTML = "<i class=\"material-icons left\">input</i> Insert";

      document.getElementById("cpf_").readOnly  = false;
      document.getElementById("password_").readOnly  = true;

      document.getElementById("name_").value =  "";
      document.getElementById("cpf_").value =  "";
      document.getElementById("email_").value =  "";
      document.getElementById("phone_").value =  "";
      document.getElementById("address_").value =  "";
      document.getElementById("password_").value = "";
      document.getElementById("university_").value = "";
      document.getElementById("course_").value = "";
      document.getElementById("department_").value =  "";
      document.getElementById("responsability_").value =  "";

    }



</script>
