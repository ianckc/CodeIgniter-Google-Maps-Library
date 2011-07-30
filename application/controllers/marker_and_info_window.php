<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marker_and_info_window extends CI_Controller {

	public function index()
	{
		
		// Set the options to use in the map
		$map_options = array(
						'centerLat'		=> '50.3697',
						'centerLng'		=> '-4.1399',
						'zoom'			=> '15'
		);
		
		// Create a basic google map
		$google_map = $this->google_maps->create($map_options);
		
		// Add a marker to the map
		$markers[0]['lat']	= $map_options['centerLat'];
		$markers[0]['lng']	= $map_options['centerLng'];
		$markers[0]['infoWindowHTML']	= "<h1>My info</h1><p>With some html</p>"; 
		
		$this->google_maps->add_markers($markers);
		
		$data['main_view'] = 'marker_and_info_window';
		
		$this->load->vars($data);
		
		$this->load->view('template');
		
	}
}
