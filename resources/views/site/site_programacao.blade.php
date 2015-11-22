@extends('site.templates.site_default')
@section('content')

    <div class="container">
        <div class="section">
            @if($activities == null || $activities->count() == 0)
                <div class="card-panel red waves-effect waves-light" role="alert">
                    "Nenhuma atividade foi cadastrada ainda."
                </div>
            @else
                <ul class="collection">
                @foreach($activities as $activity)
                    <li class="collection-item avatar">
                        <i class="material-icons circle">toc</i>
                        <span class="title">{{ $activity->name }} - {{$activity->start}} - {{$activity->startTime}}  - {{$activity->end}} - {{$activity->endTime}}</span>
                        <p>
                            <i class="material-icons">today</i>
                            <i class="material-icons">today</i>
                            <i class="material-icons">room</i>
                            <i class="material-icons">perm_identity</i>
                            <i class="material-icons">schedule</i>
                            <i class="material-icons">description</i>
                        </p>
                        <br>
                        <?php
                              $activityString = $activity->name . "?" . $activity->start . "?" . $activity->startTime . "?" .
                                                   $activity->end . "?" . $activity->endTime . "?" . $activity->location . "?" .
                                                   $activity->qnt_participants . "?" . $activity->type . "?";
                            ?>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
@stop