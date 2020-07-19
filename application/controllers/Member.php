<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Datatables');
	}

	public function index()
	{
		$this->load->view('component/bower_component');
		$this->load->view('App/Member/Modal_view');		
		$this->load->view('App/Member/Javascript_view');
		$this->load->view('App/Member/Member_view');		
	}
	public function tampil_datatables_member()
	{
		// header('Content-Type :application/json');
		echo $this->M_user->datatables_member();
	}
	public function ins_member()
	{
		$ins = [
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jk'),
			'tlp' => $this->input->post('tlp'),
			'alamat' => $this->input->post('alamat'),
		];
		$this->db->insert('tbl_member', $ins);
	}
	public function delete_member($id = NULL)
	{
		$this->db->where('id_member', $id);
		$this->db->delete('tbl_member');
	}
	public function geTByIdMember($id = NULL)
	{
		$this->db->where('id_member', $id);
		$result = $this->db->get('tbl_member')->result();
		echo json_encode($result);
	}
	public function updt_member($id = NULL)
	{
		$updt = [
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jk'),
			'tlp' => $this->input->post('tlp'),
			'alamat' => $this->input->post('alamat'),
		];
		$this->db->where('id_member', $id);
		$this->db->update('tbl_member', $updt);
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */