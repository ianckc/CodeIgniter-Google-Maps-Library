
	<h1>Marker and info window</h1>
	
	<div id="map" class="map"></div>
	
	<p>The map above adds a marker and also passes another option in the array of some HTML to display in an info window.</p>
	
	<pre>
		$markers[0]['lat']	= '50.3697';
		$markers[0]['lng']	= '-4.1399';
		$markers[0]['infoWindowHTML']	= "&lt;h1&gt;My info&lt;/h1&gt;&lt;p&gt;With some html&lt;/p&gt;"; 
		
		$this-&gt;google_maps-&gt;add_markers($markers);
	</pre>