@extends('templates.default')

@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center green-text text-darken-3">INSC!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Subscribing</h5>
      </div>
      <br><br>

    @include('templates.partials.alerts')

    </div>
  </div>
<!-- ================================= Informations ================================== -->
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="input-field col s3">
                    <select>
                        <option value="">Todas as atividades</option>
                        <option value="lecture">Palestra</option>
                        <option value="mini_course">Mini-Curso</option>
                        <option value="technical_visit">Visita Técnica</option>
                    </select>
                    <label>Filters</label>
                </div>

                <div class="input-field col s3" id="allActivities">
                    <select id="idActivity">
                        <option value="Choose one activity" disabled selected>Choose one activity</option>
                        @foreach($activities as $activity)
                            <option value="{{$activity->id}}">{{$activity->name}}</option>
                        @endforeach
                    </select>
                    <label>Activities</label>
                </div>
            </div>
        </div>
    </div>

<div class="row">
<!-- ================================= Participantes ================================= -->
    <div class="col s10">
        <h5>Participantes</h5>

        <table class="bordered highlight" id="Table1">
            <thead>
                <tr>
                    <th data-field="name">Nome</th>
                    <th data-field="cpf">CPF</th>
                    <th data-field="type">Tipo de participante</th>
                    <th data-field="role">Papel</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partSubscribed as $participant)
                    <tr>
                        <td> {{$participant->pName}} </td>
                        <td> {{$participant->cpf}} </td>
                        <td> {{$participant->type}} </td>
                        <td>
                            {{$participant->role_participant}}
                            <inptu class="hidden" value="{{$participant->pName}}&{{$participant->cpf}}&{{$participant->type}}">
                        </td>
                    </tr>
                @endforeach
                @foreach($partNotSubscribed as $participant)
                    <tr>
                        <td> {{$participant->name}} </td>
                        <td> {{$participant->cpf}} </td>
                        <td> {{$participant->type}} </td>
                        <td> Não inscrito   </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div class="col s10">
        <br> <br> <br> <br> <br>
    </div>



<!-- ===================== Palestrante/Apresentador/Responsável ====================== -->
    <div class="col s10">
        <h5>Palestrantes</h5>

        <table class="bordered highlight" id="Table2">
            <thead>
                <tr>
                    <th data-field="name">Nome</th>
                    <th data-field="cpf">CPF</th>
                    <th data-field="type">Tipo de participante</th>
                </tr>
            </thead>
                @if(($speakers == null) || ($speakers->count() == 0))
                    </table>
                    <p id="partN" style="visibility:visible"> Não existem palestrantes inscritos nessa palestra.</p>
                @else
            <tbody>
                @foreach($speakers as $speaker)
                    <tr>
                        <td> {{$speaker->pName}} </td>
                        <td> {{$speaker->cpf}} </td>
                        <td> {{$speaker->type}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p id="partN" style="visibility:hidden"> Não existem palestrantes inscritos nessa palestra.</p>
        @endif
    </div>



    <div class="col s10">
        <br> <br> <br> <br> <br>
    </div>



<!-- ===================================== Banca ===================================== -->
    <div class="col s10">
        <h5>Banca</h5>

        <table class="bordered highlight" id="Table2">
            <thead>
                <tr>
                    <th data-field="name">Nome</th>
                    <th data-field="cpf">CPF</th>
                    <th data-field="type">Tipo de participante</th>
                </tr>
            </thead>
                @if(($judges == null) || ($judges->count() == 0))
                    <p id="partN" style="visibility:visible"> Não existem membros da banca inscritos nessa palestra.</p>
            <tbody>
                @foreach($judges as $judge)
                    <tr>
                        <td> {{$judge->pName}} </td>
                        <td> {{$judge->cpf}} </td>
                        <td> {{$judge->type}} </td>
                        <td>
                            <button style="visibility:hidden" value="{{$judge->pName}}&{{$judge->cpf}}&{{$judge->type}}" class="waves-effect waves-green btn" onclick="moveL2R(this)"> >> </button>
                        </td>
                    </tr>
                @endforeach
                    <tr>
                        <td>
                            <select id="idActivity">
                                <option value="Choose one participant" disabled selected>Choose one participant</option>
                                @foreach($partNotSubscribed as $participant)
                                    <option value="{{$participant->id}}">{{$participant->name}}</option>
                                @endforeach
                            </select>
                            <label>Participants</label>
                        <td>

                        <td>
                            <button class="waves-effect waves-green btn" > Add as a judge </button>
                        </td>
                    </tr>
            </tbody>
        </table>
        <p id="partN" style="visibility:hidden"> Não existem membros da banca inscritos nessa palestra.</p>
        @endif
    </div>



    <div class="col s10">
        <br> <br> <br> <br> <br>
    </div>


</div>
@stop
