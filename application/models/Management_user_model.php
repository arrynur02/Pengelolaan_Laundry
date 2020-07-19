<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_user_model extends CI_Model {

	public function login($username,$password)
	{
		$this->db->where("(username='$username' AND password='$password')");
		return $this->db->get('tb_user');
	}
	public function get_datatables()
	{
		$this->datatables->select('id_user,tb_user.nama,username,password,role,tb_outlet.id_outlet,nama_outlet,');
		$this->datatables->from('tb_user');
		$this->datatables->join('tb_outlet', 'tb_outlet.id_outlet = tb_user.id_outlet', 'left');
		$this->datatables->add_column('aksi','
				<center>
					<a data_u1="$1" data_u2="$2" data_u3="$3" data_u4="$4" data_u5="$5" data_u6="$6" href="javascript:void(0)" class="text-primary btn-edit-user"><i class="mdi mdi-pencil"></i> Edit<a/> | 
					<a data_id="$1" href="javascript:void(0)" class="text-danger btn-delete-usr"><i class="mdi mdi-delete"></i> Hapus<a/>
				</center>','id_user,nama,username,password,role,id_outlet');
		return $this->datatables->generate();
	}
	public function insert($insrt)
	{
		return $this->db->insert('tb_user', $insrt);
	}
	public function update($data_id , $updt)
	{
		$this->db->where('id_user', $data_id);
		return $this->db->update('tb_user', $updt);
	}
	public function delete($data_id)
	{
		$this->db->where('id_user', $data_id);
		return $this->db->delete('tb_user');
	}


	// Member --------------------------------------------------------------------------------------------------//
	public function datatables_member()
	{
		$this->datatables->select('id_member,nama,alamat,jenis_kelamin,tlp');
		$this->datatables->from('tbl_member');
		$this->datatables->add_column('aksi','
				<center>
					<a data_u="$1" href="javascript:void(0)" class="text-primary btn-edit-member"><i class="mdi mdi-pencil"></i> Edit<a/> | 
					<a data_id="$1" href="javascript:void(0)" class="text-danger btn-delete-member"><i class="mdi mdi-delete"></i> Hapus<a/>
				</center>','id_member');
		return $this->datatables->generate();
	}
	public function getallMember()
	{
		return $this->db->get('tbl_member');
	}

}

/* End of file Management_user.php */
/* Location: ./application/models/Management_user.php */