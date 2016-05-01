@extends('templates.default_crud')

@section('subheader')
    <br><br>
        <h1 class="header center green-text text-darken-3">Opções do Usuário</h1>
        <div class="row center">
          <h5 class="header col s12 light">Você pode alterar as suas informações pessoais: nome, endereço e etc.</h5>
        </div>
    <br><br>
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
            <form class="col s12" method="POST" action="{{ route('operations.alteruserinfo') }}">

                <div class="row">

                    <div class="input-field col s6">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="name_" name="name" type="text" class="validate" value="{{ $participant->name }}">
                        <label id="lname" for="name">Nome</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">credit_card</i>
                        <input id="cpf_" name="cpf" type="text" class="validate" value="{{ $participant->cpf }}">
                        <label id="lcpf" for="cpf">CPF</label>
                    </div>
                </div>

                <div class="row">

                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input id="email_" name="email" type="email" class="validate" value="{{ $participant->email }}">
                        <label id="lemail" for="email">Email</label>
                    </div>

                     <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone_" name="phone" type="text" class="validate" value="{{ $participant->phone }}">
                        <label id="lphone" for="phone">Telefone</label>
                    </div>

                </div>


                <div class="row">

                    <div class="input-field col s6">
                        <i class="material-icons prefix">location_on</i>
                        <input id="address_" name="address" type="text" class="validate" value="{{ $participant->address }}">
                        <label id="laddress" for="address">Endereço</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">store</i>
                        <input id="university_" name="university" type="text" class="validate" value="{{ $participant->university }}">
                        <label id="luniversity" for="university">Universidade</label>
                    </div>
                                   
                </div>

                <div class="row">

                    <div class="input-field col s6">
                        <i class="material-icons prefix">assignment</i>
                        <input id="course_" name="course" type="text" class="validate" value="{{ $participant->course }}">
                        <label id="lcourse" for="course">Curso</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">work</i>
                        <input id="department_" name="department" type="text" class="validate" value="{{ $participant->department }}">
                        <label id="ldepartment" for="department">Departamento</label>
                    </div>

                </div>



                <div class="row">

                    <div class="input-field col s3 offset-s3">
                        <button id="incluir_alterar" type="submit" class="waves-effect waves-light btn">
                          <i class="material-icons left">input</i>
                          Alterar
                        </button>
                    </div>

                    <div class="input-field col s3">
                      <button id="clearButton_" name="clearButton" class="waves-effect waves-light btn" type="reset" onclick="cancelAll()">
                        <i class="material-icons left">delete</i>
                        Limpar Campos
                      </button>
                    </div>

                </div>

                <input type="hidden" id="_token" name=" _token" value="{{ Session::token() }}">

            </form>
        </div>
    </div>
@stop


<script type="text/javascript">

    function cancelAll()
    {
      document.getElementById("cpf_").readOnly  = false;
      document.getElementById("name_").value =  "";
      document.getElementById("cpf_").value =  "";
      document.getElementById("email_").value =  "";
      document.getElementById("phone_").value =  "";
      document.getElementById("address_").value =  "";
      document.getElementById("university_").value = "";
      document.getElementById("course_").value = "";
      document.getElementById("department_").value =  "";
    }

</script>