






<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', function () {
		var places = new google.maps.places.Autocomplete(document.getElementById('adresse'));
		google.maps.event.addListener(places, 'place_changed', function () {

		});
	});
</script>