<?php

/**
 * CodeIgniter Google Maps Library by Ian Luckraft	http://ianluckraft.co.uk	ian@ianluckraft.co.uk
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @category   Google Maps
 * @package    CodeIgniter
 * @subpackage Client
 * @version    0.1
 * @license    http://www.gnu.org/licenses/     GNU General Public License
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Google_maps {

	/*
	 * Variable to hold an insatance of CodeIgniter so we can access CodeIgniter features
	 */
	protected $codeigniter_instance;
	
	/*
	 * Variable to hold the output
	 */
	private $output = array(
						'create'	=> '',
						'scripts'	=> array()
	);
	
	/*
	 * Function to create a basic map
	 * This function should always be called
	 * @param optional array of map options
	 */
	public function create($user_options = null)
	{
		
		// Create an array of default options
		$options = array(
					'elementId'		=> 'map',
					'sensor'		=> 'false',
					'centerLat'		=> '0',
					'centerLng'		=> '0',
					'mapTypeId'		=> 'ROADMAP',
					'zoom'			=> '0'
		);
		
		// If the user has specified options merge them with the default options array
		if($user_options !== null)
		{
			
			$options = array_merge($options, $user_options);
			
		}
		
		// Load the map scripts
		$this->output['create'] = "google.load('maps', '3', {other_params:'sensor=" . $options['sensor'] . "'});" . "\n";
		
		// Create a variable to hold the google map
		$this->output['create'] .= 'var googleMap;' . "\n";
		
		// Create a variable to hold the default lat lng
		$this->output['create'] .= 'var defaultLatLng;' . "\n";

		// Create a function to initialize a map
		$this->output['create'] .= 'function mapInit() {' . "\n";
		
		// Set the default lat lng
		$this->output['create'] .= 'defaultLatLng = new google.maps.LatLng(' . $options['centerLat'] . ', ' . $options['centerLng'] . ');' . "\n";
		
		// Create the map options
		$this->output['create'] .= 'var mapOptions = {' . "\n";
		$this->output['create'] .= 'zoom: ' . $options['zoom'] . ',' . "\n";
		$this->output['create'] .= 'center: defaultLatLng,' . "\n";
		$this->output['create'] .= 'mapTypeId: google.maps.MapTypeId.' . $options['mapTypeId'] . "\n";
		$this->output['create'] .= '};' . "\n";
		
		// Create the new map and assign it to the googleMap variable 
		$this->output['create'] .= 'googleMap = new google.maps.Map(document.getElementById("' . $options['elementId'] . '"), mapOptions);' . "\n";
		
	}
	
	/*
	 * Function to add to the scripts array
	 * @param string function call
	 * @param string script
	 */
	private function add_to_scripts($function_call, $script)
	{
		
		// Get the current array length
		$array_length = count($this->output['scripts']);
		
		// Add the function call and script to the array
		$this->output['scripts'][$array_length]['call']		= $function_call;
		$this->output['scripts'][$array_length]['script']	= $script;
		
	}
	
	/*
	 * Function to add markers to a map
	 * @param array of markers
	 * A multi dimensional array which allows for multiple markers to be added to a map
	 * Each array requires a lat and lng value and can contain optional keys of
	 * infoWindowHTML - The HTML that should be passed into the info window
	 */
	public function add_markers($markers) {
		
		// Create a variable to hold the script
		$add_markers = '';
		
		// Check that the variable passed in is 
		if(is_array($markers))
		{
			
			// Create the add map markers function
			$add_markers .= 'function addMapMarkers() {' . "\n";
			
			// Set a counter to append to marker variables
			$i = 0;
			
			// Loop through the markers array
			foreach($markers as $marker)
			{
				
				// Create a variable to hold the new marker and add it to the map
				$add_markers .= 'var marker' . $i . ' = new google.maps.Marker({';
				$add_markers .= 'position: new google.maps.LatLng(' . $marker['lat'] . ', ' . $marker['lng'] . '),';
				$add_markers .= 'map: googleMap';
				$add_markers .= '});' . "\n";
				
				// Check if the marker should have an info window
				if(isset($marker['infoWindowHTML'])) {
					
					// Add a click event to the marker
					$add_markers .= "google.maps.event.addListener(marker" . $i . ", 'click', function(event) {" . "\n";
					
					// Create a new info window and open it
					$add_markers .= "var infoWindow" . $i . " = new google.maps.InfoWindow({content:'" . str_replace("'", "\'", $marker['infoWindowHTML']) . "'});" . "\n";
					$add_markers .= 'infoWindow' . $i . '.open(googleMap, marker' . $i . ');' . "\n";
					
					$add_markers .= '});';
					
				}
				
				// Increment the counter
				$i++;
				
			}
			
			// Close the add map markers function
			$add_markers .= '}' . "\n";
			
		}
		
		// Add to the scripts array
		$this->add_to_scripts('addMapMarkers();', $add_markers);
		
	}
	
	/*
	 * Function to extract the lat lng values of a click on the map
	 * @param string lat input id
	 * @param string lng input id
	 */
	public function extract_lat_lng($lat_input_id, $lng_input_id)
	{
	
		// Open the extract lat lng function
		$extract_lat_lng = 'function extractLatLng() {' . "\n";
		
		// Add a click event to the map
		$extract_lat_lng .= "google.maps.event.addListener(googleMap, 'click', function(event) {" . "\n";
		
		// Get the click event lat lng and pull them out into their own variables
		$extract_lat_lng .= 'var eventLatLng = event.latLng;' . "\n";
		$extract_lat_lng .= 'var lat = eventLatLng.lat();' . "\n";
		$extract_lat_lng .= 'var lng = eventLatLng.lng();' . "\n";
		
		// Update the inputs with the lat lng values
		$extract_lat_lng .= 'document.getElementById("' . $lat_input_id . '").value = lat;' . "\n";
		$extract_lat_lng .= 'document.getElementById("' . $lng_input_id . '").value = lng;' . "\n";
		
		// Close the click event
      	$extract_lat_lng .= '});' . "\n";
		
      	// Close the extract lat lng function
		$extract_lat_lng .= '}';
	
		// Add to the scripts array
		$this->add_to_scripts('extractLatLng();', $extract_lat_lng);
		
	}
	
	/*
	 * Function to output the map scripts
	 * Place the following php code where you want the scripts to be output
	 * echo $this->google_maps->output();
	 */
	public function output() {
		
		// Load the google jsapi scripts
		$output = '<script src="http://www.google.com/jsapi"></script>' . "\n";
	 
		// Begin outputting the create script
		$output .= '<script>' . "\n";
		
		$output .= $this->output['create'];
		
		// If there are additional scripts loop through them
		if(count($this->output['scripts']) != 0)
		{
			
			$additional_scripts = '';
			
			foreach($this->output['scripts'] as $script)
			{
				
				$output .= $script['call'] . "\n";
				
				$additional_scripts .= '<script>' . "\n" . $script['script'] . "\n" . '</script>' . "\n";
				
			}
			
		}
		
		// Close the mapInit function
		$output .= '}' . "\n";
		
		// When the google scripts have loaded call the map init function
		$output .= 'google.setOnLoadCallback(mapInit);' . "\n";
		
		// Close the script containing the init function and calls
		$output .= '</script>' . "\n";
		
		// Add the additional scripts to the output
		if(isset($additional_scripts))
		{
			$output .= $additional_scripts;
		}
		
		return $output;
		
	}
	
}