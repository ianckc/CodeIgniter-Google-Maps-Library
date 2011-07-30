<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Extract_lat_lng extends CI_Controller {

	public function index()
	{
		
		// Set the options to use in the map
		$map_options = array(
						'centerLat'		=> '50.3697',
						'centerLng'		=> '-4.1399',
						'zoom'			=> '10'
		);
		
		// Create a basic google map
		$google_map = $this->google_maps->create($map_options);
		
		$this->google_maps->extract_lat_lng('latitude', 'longitude');
		
		$data['main_view'] = 'extract_lat_lng';
		
		$this->load->vars($data);
		
		$this->load->view('template');
		
	}
}
