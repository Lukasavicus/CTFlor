@extends('site.templates.site_default')
@section('content')

	<div class="container">
    	<div class="section">

    		@include('templates.partials.alerts')


	<!-- ================================================================================================ -->
		<div class="row col s12">
			<div id='map'></div>
		</div>

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4660.595434355405!2d-47.527362174509435!3d-23.581761733323013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c58955e4f6cf27%3A0x42d15f63aaffc1bd!2sUFSCAR+-+Campus+Sorocaba!5e0!3m2!1spt-BR!2sbr!4v1447421753233" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>

	<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

    	</div>
  	</div>
@stop

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9_B-QyddzvSvKWLMB0w0Kgi_vsc7gXuw">
</script>

<script>

    window.onload = function(){
        initMap();
    }

	var map;
	function initMap() {
  		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -23.5819062, lng: -47.5260484},
			zoom: 15
		});
	}
</script>

<style type="text/css">
  html, body { height: 100%; margin: 0; padding: 0; }
  #map { height: 100%; }
</style>