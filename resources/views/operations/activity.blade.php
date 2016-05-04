@extends('templates.default_crud')

@section('subheader')
    <br><br>
        <h1 class="header center green-text text-darken-3">Palestras</h1>
        <div class="row center">
          <h5 class="header col s12 light">Você pode buscar, criar, alterar e excluir Atividades</h5>
        </div>
    <br><br>
@stop


@section('fields')
  



  <ul class="collapsible" data-collapsible="accordion">
    @foreach($lectures as $lecture)
      <li>
        <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{$lecture->name}}</div>
        <div class="collapsible-body">
            <p>{{$lecture->description}}</p>
            <button class="waves-effect waves-light green darken-4 btn" type="submit">Sign In</button>
        </div>                                            
      </li>
    @endforeach
  </ul>


        <!--<li>
          <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
          <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
          <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>-->
@stop


<script type="text/javascript">
	$(document).ready(function(){
	    $('.collapsible').collapsible({
	      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
	    });
	});
</script>