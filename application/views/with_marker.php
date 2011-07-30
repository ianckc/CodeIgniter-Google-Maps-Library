
	<h1>Map with marker</h1>
	
	<div id="map" class="map"></div>
	
	<p>The map above uses the add_markers function</p>
	
	<p>Once a <?php echo anchor(site_url(), 'basic map'); ?> has been created we create an array with the lat lng values and pass it to the add_markers function.</p>
	
	<pre>
		$markers[0]['lat']	= '50.3697';
		$markers[0]['lng']	= '-4.1399';
		
		$this-&gt;google_maps-&gt;add_markers($markers);
	</pre>
	
	<p>Multiple markers can be added by creating more array elements.</p>
	
	<p>The add_markers function can also <?php echo anchor('marker-and-info-window', 'show an info window when the marker is clicked'); ?>.</p>