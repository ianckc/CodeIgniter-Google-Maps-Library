
	<h1>Extract lat lng</h1>
	
	<div id="map" class="map"></div>
	
	<div>
	
		<form action="" method="post">
		
			<ul>
				<li>
					<label for="latitude">Latitude</label>
					<input type="text" name="latitude" id="latitude" />
				</li>
				<li>
					<label for="longitude">Longitude</label>
					<input type="text" name="longitude" id="longitude" />
				</li>
			</ul>
		
		</form>
	
	</div>
	
	<p>The above map uses the extract_lat_lng function. This function requires two parameters, the id of the lat input and the id of the lng input.</p>
	
	<pre>
	$this-&gt;google_maps-&gt;extract_lat_lng('latitude', 'longitude');
	</pre>