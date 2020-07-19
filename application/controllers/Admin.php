<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
	public function Dashboard()
	{
		$this->load->view('component/bower_component');
		$this->load->view('App/Dashboard/Dashboard_view');
		// $this->load->view('App/Dashboard/Javascript_view');
	}
	public function Calender()
	{
		$this->load->view('component/bower_component');
		$this->load->view('App/Calender/Calender_view');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */