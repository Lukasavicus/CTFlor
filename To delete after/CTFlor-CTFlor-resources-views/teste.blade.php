@extends('templates.default')

@section('content')
	<form method="POST" action="{{ route('teste') }}">
		<button type="submit"> Create </button>
		<input type="hidden" id="_token" value="{{Session::token()}}">
	</form>
@stop