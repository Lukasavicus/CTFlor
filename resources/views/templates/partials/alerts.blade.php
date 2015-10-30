@if (Session::has('info'))
	<script>alert('info');</script>
	<!--
	<div class="nav-wrapper" role="alert">
		{{ Session::get('info') }}
	</div>
	-->
@endif

@if (Session::has('error'))
	<script>alert('error');</script>
	<!--
	<div class="nav-wrapper" role="alert">
		{{ Session::get('error') }}
	</div>
	-->
@endif