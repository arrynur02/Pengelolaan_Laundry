<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Datatables');
		if ($this->session->userdata('id_user') == "") {
			redirect('Login');
		}
	}

	public function index()
	{
		$this->load->view('App/App/App_view');		
	}

}

/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */