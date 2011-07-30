
	<p><a href="#">Download the CodeIgniter Google Maps Library from GitHub</a></p>
	
	<nav>
	
		<h1>Examples</h1>
		
		<ul>
			<li><?php echo anchor('/with-marker/', 'With a marker'); ?></li>
			<li><?php echo anchor('/marker-and-info-window/', 'Marker with an info window'); ?></li>
			<li><?php echo anchor('/extract-lat-lng/', 'Extract lat lng when a user clicks the map'); ?></li>
		</ul>
	
	</nav>
	
	<p>All of the examples assume you have loaded the google_maps library with either the autoload in application/config/autoload.php or with the following in a controller</p>
	
	<pre>$this-&gt;load-&gt;library('google_maps');</pre>
	
	<p>As well as adding the output function in your view</p>
	
	<pre>echo $this-&gt;google_maps-&gt;output();</pre>
	
	<div id="basic-map" class="map"></div>
	
	<p>The map above is a basic map and is created using this code</p>
	
	<pre>$this-&gt;google_maps-&gt;create(array('elementId' =&gt; 'basic-map'));</pre>
	
	<p>All the function needs is the id of the element that the map will appear in. If you don't pass an element id in to the function it will default to map.</p>