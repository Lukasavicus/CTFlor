@extends('templates.default')

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content" >
    <form id="formHeader" name="formHeader" method="POST" action="">
        <h4>Delete Register</h4>
        <p>Do you really wanna delete the register:</p>
        <p id="modalMSG"></p>
        <input type="hidden" id="modalMSGValue" name="modalMSGValue" value="">
        <p>Doing this you can't recovery this register again</p>
        </div>
        <div class="modal-footer">
        <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Submit</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
    <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
  </div>
</div>


@section('content')
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">

        @yield('subheader')

        @include('templates.partials.alerts')

    </div>
  </div>

<div class="container">
    <div class="section">
        @yield('search')
  	</div>
</div>

<div class="container">
    <div class="section">
        @yield('fields')
	  </div>
</div>

<div class="container">
    <div class="section">
        @yield('elements')
	  </div>
</div>

@stop
