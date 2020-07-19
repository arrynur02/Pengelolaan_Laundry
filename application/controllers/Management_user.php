<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_user extends CI_Controller {
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
		$x['outlet'] = $this->db->get('tb_outlet');
		$this->load->view('component/bower_component');
		$this->load->view('App/Management_user/Javascript_view');
		$this->load->view('App/Management_user/Modal_view',$x);
		$this->load->view('App/Management_user/Management_user_view');
	}
	public function datatables()
	{
		// header('Content-Type : application/json');
		echo $this->M_user->get_datatables();
	}
	public function insert_users()
	{
		$insrt = [
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'id_outlet' => $this->input->post('outlet'),
			'role' => $this->input->post('role'),
		];
		$this->M_user->insert($insrt);
	}
	public function update_users($data_id)
	{
		$updt = [
			'nama' => $this->input->post('nama_e'),
			'username' => $this->input->post('username_e'),
			'password' => $this->input->post('password_e'),
			'id_outlet' => $this->input->post('outlet_e'),
			'role' => $this->input->post('role_e'),
		];
		$this->M_user->update($data_id , $updt);
	}
	public function delete_users($data_id)
	{
		$this->M_user->delete($data_id);
	}

}

/* End of file Management_user.php */
/* Location: ./application/controllers/Management_user.php */