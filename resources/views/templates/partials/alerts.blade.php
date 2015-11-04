@if (Session::has('personal'))
	<div class="card-panel lime waves-effect waves-light" role="alert">
		{{ Session::get('personal') }}
	</div>
@endif

@if (Session::has('info'))
	<div class="card-panel lime waves-effect waves-light" role="alert">
		{{ Session::get('info') }}
	</div>
@endif

@if (Session::has('error'))
	<div class="card-panel red waves-effect waves-light" role="alert">
		{{ Session::get('error') }}
	</div>
	<input type="text" value="{{ Session::get('error') }}">
@endif

@if (Session::has('activity'))
	<div class="card-panel lime waves-effect waves-light" role="alert">
		{{ Session::get('activity') }}
		Alguma coisa de Atividades
	</div>
@endif

@if (Session::has('participant'))
	<div class="card-panel lime waves-effect waves-light" role="alert">
		{{ Session::get('participant') }}
		Alguma coisa de participantes
	</div>
@endif