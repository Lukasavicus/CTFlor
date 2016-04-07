@extends('templates.default')

@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center green-text text-darken-3">Inscritos!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Inscreva-se</h5>
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
                        <option value="">Todas os tipos de Participantes</option>
                        <option value="community">Comunidade</option>
                        <option value="student">Aluno</option>
                        <option value="professor">Professor</option>
                        <option value="organization">Oraganização</option>
                    </select>
                    <label>Filtros</label>
                </div>

                <div class="input-field col s3" id="allActivities">
                    <select id="idActivity">
                        <option value="Choose one activity" disabled selected>Escolha uma atividade</option>
                        @foreach($participants as $participant)
                            <option value="{{$participant->id}}">{{$participant->name}}</option>
                        @endforeach
                    </select>
                    <label>Participantes</label>
                </div>
            </div>
        </div>
    </div>

<div class="row">
<!-- =================================== Palestras =================================== -->
    <div class="col s10">
        <h5>Palestras</h5>

        <table class="bordered highlight" id="Table1">
            <thead>
                <tr>
                    <th data-field="name">Nome</th>
                    <th data-field="start">Data Inicio</th>
                    <th data-field="startTime">Horário Inicio</th>
                    <th data-field="endTime">Data Fim</th>
                    <th data-field="endTime">Horário Fim</th>
                    <th data-field="location">Local</th>
                    <th data-field="role_participant">Papel</th>
                </tr>
            </thead>
                @if(($lectures == null))
                    </table>
                    <p style="visibility:visible"> Esse participante não está inscrito em nenhuma palestra.</p>
                @else
            <tbody>
                @foreach($lectures as $lecture)
                    <tr>
                        <td> {{$lecture->aName}} </td>
                        <td> {{$lecture->start}} </td>
                        <td> {{$lecture->startTime}} </td>
                        <td> {{$lecture->end}} </td>
                        <td> {{$lecture->endTime}} </td>
                        <td> {{$lecture->location}} </td>
                        <td>
                            {{$lecture->role_participant}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>


    <div class="col s10">
        <br> <br> <br> <br> <br>
    </div>



<!-- ================================= Mini-Cursos =================================== -->
    <div class="col s10">
        <h5>Mini-Cursos</h5>

        <table class="bordered highlight" id="Table2">
            <thead>
                <tr>
                    <th data-field="name">Nome</th>
                    <th data-field="start">Data Inicio</th>
                    <th data-field="startTime">Horário Inicio</th>
                    <th data-field="endTime">Data Fim</th>
                    <th data-field="endTime">Horário Fim</th>
                    <th data-field="location">Local</th>
                    <th data-field="role_participant">Papel</th>
                </tr>
            </thead>
                @if(($mini_courses == null))
                    </table>
                    <p style="visibility:visible"> Esse participante não está inscrito em nenhum mini-curso.</p>
                @else
            <tbody>
                @foreach($mini_courses as $mini_course)
                    <tr>
                        <td> {{$mini_course->aName}} </td>
                        <td> {{$mini_course->start}} </td>
                        <td> {{$mini_course->startTime}} </td>
                        <td> {{$mini_course->end}} </td>
                        <td> {{$mini_course->endTime}} </td>
                        <td> {{$mini_course->location}} </td>
                        <td>
                            {{$mini_course->role_participant}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>


    <div class="col s10">
        <br> <br> <br> <br> <br>
    </div>



<!-- ================================= Visitas Técnicas ============================== -->
        <div class="col s10">
        <h5>Visitas Técnicas</h5>

        <table class="bordered highlight" id="Table2">
            <thead>
                <tr>
                    <th data-field="name">Nome</th>
                    <th data-field="start">Data Inicio</th>
                    <th data-field="startTime">Horário Inicio</th>
                    <th data-field="endTime">Data Fim</th>
                    <th data-field="endTime">Horário Fim</th>
                    <th data-field="location">Local</th>
                    <th data-field="role_participant">Papel</th>
                </tr>
            </thead>
                @if(($technical_visits == null))
                    </table>
                    <p style="visibility:visible"> Esse participante não está inscrito em nenhuma visita técnica.</p>
                @else
            <tbody>
                @foreach($technical_visits as $technical_visit)
                    <tr>
                        <td> {{$technical_visit->aName}} </td>
                        <td> {{$technical_visit->start}} </td>
                        <td> {{$technical_visit->startTime}} </td>
                        <td> {{$technical_visit->end}} </td>
                        <td> {{$technical_visit->endTime}} </td>
                        <td> {{$technical_visit->location}} </td>
                        <td>
                            {{$technical_visit->role_participant}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>


    <div class="col s10">
        <br> <br> <br> <br> <br>
    </div>


</div>
@stop
