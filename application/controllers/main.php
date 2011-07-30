<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		
		// Create a basic google map
		$this->google_maps->create(array('elementId' => 'basic-map'));
		
		$data['main_view'] = 'home_page';
		
		$this->load->vars($data);
		
		$this->load->view('template');
		
	}
}
