@extends('site.templates.site_default')



@section('content')
<div class="container">
      <h3> Faça log-in na nossa plataforma agora mesmo!</h3>
      <br />
      <br />
        <div class="row">
            <form class="col s8" >
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                  
                  <h3> Voc&ecirc; saiu com sucesso.</h3>      
                  <h5> <a class="link" href="{{ route('site.login') }}">Log In</a> </h5>
                        
                </div>
              </div>
            </form>
        </div>
</div>
@stop
