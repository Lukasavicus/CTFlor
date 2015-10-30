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
@endif