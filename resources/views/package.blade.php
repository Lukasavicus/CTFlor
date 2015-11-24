@extends('templates.default_crud')

@section('subheader')
    <br><br>
        <h1 class="header center green-text text-darken-3">Packages' Page</h1>
        <div class="row center">
          <h5 class="header col s12 light">You can create, recovery, update and delete</h5>
        </div>
    <br><br>
@stop


@section('search')
    <div class="row">
        <div class="card card-panel">
            <form class="col s12" action="{{ route('packages.search') }}" method="POST">
            	<div class="input-field col s6">
                  <select id="idP_" name="idP">
                      <option>Choose your option</option>
                      @foreach($packages as $p)
                          <option value="{{$p['id']}}">{{$p['name']}}</option>
                      @endforeach
                  </select>
                  <label><i class="material-icons left">description</i>Tipo</label>
              </div>
              <div class="input-field col s3">
                  <button type="submit" class="waves-effect waves-light btn">
                    <i class="material-icons left">input</i>
                    Search
                  </button>
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

            <form class="col s12" method="POST" action="{{ route('packages') }}">

                <div class="row">

                    <div class="input-field" style="visibility:hidden">
                        <i class="material-icons prefix">toc</i>
                        <input id="id_" name="id" type="number" class="validate" value="-1">
                        <label id="lid" for="icon_prefix">ID:</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">toc</i>
                        <input id="name_" name="name" type="text" class="validate">
                        <label id="lname" for="icon_prefix">Name of Package:</label>
                    </div>

                </div>

                @if($activities == null || $activities->count() == 0)
                    <div class="card-panel red waves-effect waves-light" role="alert">
                        "Nenhuma Atividade foi cadastrada ainda."
                    </div>
                @else
                    <table class="responsive-table">
                        <?php $i = 0; ?>
                        @foreach($activities as $activity)
                            <tr>

                                    <td>
                                        <i class="material-icons left">perm_identity</i>
                                        <span id="nameSearch" name="nameSearch">{{ $activity->name }}</span>
                                    </td>


                                    <td>
                                        <i class="tiny material-icons left">credit_card</i>
                                        <span id="cpfSearch" name="cpfSearch">{{ $activity->type }}</span>
                                    </td>

                                    <td>
                                        <i class="tiny material-icons left">credit_card</i>
                                        <span id="cpfSearch" name="cpfSearch">{{ $activity->priceActivity }}</span>
                                    </td>

                                    <td>
                                      <div class="switch">
                                        <label>
                                          Off
                                          <input id="cb_{{$activity->id}}" name="cb_{{$activity->id}}" type="checkbox" onclick="change(this.id+'&{{ $activity->priceActivity }}')">
                                          <span class="lever"></span>
                                          On
                                        </label>
                                      </div>
                                    </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach

                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                          Total:
                        </td>
                        <td>
                          <p id="precoFinal">

                          </p>
                        </td>

                    </table>
              @endif

                <input type="hidden" id="_token" name="_token" value="{{ Session::token() }}">

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

            </form>
        </div>
    </div>
@stop

@section('elements')
    <div class="row">
        <div class="card card-panel">
            @if($packagesactivities == null || $packagesactivities->count() == 0)
                    <div class="card-panel red waves-effect waves-light" role="alert">
                        "Nenhum Pacote foi cadastrado ainda, ou nenhum pacote foi selectionado."
                    </div>
                @else
                    <table class="responsive-table">
                        <?php $i = 0; $max = 0; ?>
                        @foreach($packagesactivities as $activity)

                          <?php

                            $nameActivity = "";
                            $priceActivity = "";

                              foreach ($activities as $a){
                                if($a->{'id'} == $activity->id_activity){
                                  $nameActivity = $a->{'name'};
                                  $priceActivity = $a->{'priceActivity'};
                                  $max += $priceActivity;
                                }
                              }
                          ?>

                            <tr>

                                    <td>
                                        <i class="material-icons left">perm_identity</i>
                                        <span id="nameSearch" name="nameSearch">{{ $activity->name }}</span>
                                    </td>


                                    <td>
                                        <i class="tiny material-icons left">credit_card</i>
                                        <span id="cpfSearch" name="cpfSearch">
                                          {{$nameActivity}}
                                        </span>
                                    </td>

                                    <td>
                                        <i class="tiny material-icons left">credit_card</i>
                                        <span id="cpfSearch" name="cpfSearch">{{ $priceActivity }}</span>
                                    </td>

                                    <td>
                                      <div class="switch">
                                        <label>
                                          Off
                                          <input id="cb_{{$activity->id}}" name="cb_{{$activity->id}}" type="checkbox" checked="true" disabled="true">
                                          <span class="lever"></span>
                                          On
                                        </label>
                                      </div>
                                    </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach

                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                          Total:
                        </td>
                        <td>
                          <p id="precoFinal2">
                          {{ $max }}
                          </p>
                        </td>

                    </table>

                    <div class="input-field col s3">
                        <button id="incluir_alterar" type="submit" class="waves-effect waves-light btn">
                          <i class="material-icons left">input</i>
                          Update
                        </button>
                    </div>

                    <div class="input-field col s3">
                      <button id="clearButton_" name="clearButton" class="waves-effect waves-light btn" type="reset" >
                        <i class="material-icons left">delete</i>
                        Delete
                      </button>
                    </div>
              @endif
        </div>
    </div>
@stop

<script type="text/javascript">
      
    var Total;

    window.onload = function() {
        document.formHeader.action = "{{ route('crud.participant.delete') }}";
        Total = 0;
        document.getElementById('precoFinal').innerHTML = Total;
    }


    /*
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
    */

    /*
    function editMode(){
      document.getElementById("cancelar").setAttribute("style", "visibility:visible");
      document.getElementById("incluir_alterar").innerHTML = "<i class=\"material-icons left\">input</i> Alterar";
      document.getElementById("cpf_").readOnly  = true;
      document.getElementById("password_").readOnly  = true;
    }
    */

    /*
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
    */

    function change(texto){
      var split = texto.split('&');
      //alert(split[0] + " " + document.getElementById(split[0]).checked + " " + split[1]);
      if(document.getElementById(split[0]).checked === true)
        add(parseFloat(split[1]));
      else
        minus(parseFloat(split[1]));
    }

    function add(preco){
      //alert('a ' + preco + " " + document.getElementById('precoFinal'));
      Total += preco;
      document.getElementById('precoFinal').innerHTML = Total;
    }

    function minus(preco){
      //alert('a ' + preco + " " + document.getElementById('precoFinal'));
      Total -= preco;
      document.getElementById('precoFinal').innerHTML = Total;
    }


</script>
