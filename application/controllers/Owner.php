<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('id_user') == "") {
			redirect('Login');
		}
	}

	public function index()
	{
		$this->load->view('App/App/App_view');	
	}

}

/* End of file Owner.php */
/* Location: ./application/controllers/Owner.php */