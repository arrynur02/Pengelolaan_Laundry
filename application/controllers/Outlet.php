<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Datatables');
	}

	public function index()
	{
		$this->load->view('component/bower_component');
		$this->load->view('App/Outlet/Javascript_view');
		$this->load->view('App/Outlet/Modal_view');
		$this->load->view('App/Outlet/Outlet_view');		
	}
	public function get_all_by_tables()
	{
		// header('Content-Type :application/json');
		echo $this->Outlet_model->get_tables_outlet();
	}
	public function insert_outlet()
	{
		$insrt = [
			'nama_outlet' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'tlp' => $this->input->post('tlp'),
		];
		$this->Outlet_model->insert($insrt);
	}
	public function delete_outlet()
	{
		$id = $this->input->post("data_id");

		$this->Outlet_model->delete($id);
	}
	public function update_outlet($data_id)
	{
		$updt = [
			'nama_outlet' => $this->input->post('nama_edit'),
			'alamat' => $this->input->post('alamat_edit'),
			'tlp' => $this->input->post('tlp_edit'),
		];
		$this->Outlet_model->update($data_id , $updt);
	}

}

/* End of file Outlet.php */
/* Location: ./application/controllers/Outlet.php */