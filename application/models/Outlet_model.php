<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet_model extends CI_Model {

	public function get_tables_outlet()
		{
			$this->datatables->select('id_outlet,nama_outlet,alamat,tlp');
			$this->datatables->from('tb_outlet');
			$this->datatables->add_column('aksi','
				<center>
					<a data1="$1" data2="$2" data3="$3" data4="$4" href="javascript:void(0)" class="text-primary action-icon btn-edit-outlet"><i class="mdi mdi-pencil"></i></a> | 
					<a data_id="$1" href="javascript:void(0)" class="text-danger action-icon btn-act-delete"><i class="mdi mdi-delete"></i></a>
				</center>','id_outlet,nama_outlet,alamat,tlp');
			return $this->datatables->generate();
		}
	public function insert($insrt)
		{
			return $this->db->insert('tb_outlet', $insrt);
		}
	public function delete($id)
		{
			$this->db->where('id_outlet', $id);
			return $this->db->delete('tb_outlet');
		}
	public function update($data_id , $updt)
		{
			$this->db->where('id_outlet', $data_id);
			return $this->db->update('tb_outlet', $updt);
		}
		// Paket --------------------------------------------------------------------------------------------------------
	public function getalldata()
		{
			$this->datatables->select('id_paket,tb_outlet.id_outlet,nama_outlet,alamat,tlp,alamat,jenis,nama_paket,harga');
			$this->datatables->from('tbl_paket');
			$this->datatables->join('tb_outlet', 'tb_outlet.id_outlet = tbl_paket.id_outlet', 'left');
			$this->datatables->add_column('aksi','
				<center>
					<a data1="$1" href="javascript:void(0)" class="text-primary action-icon btn-edit-paket"><i class="mdi mdi-pencil"></i></a> | 
					<a data_id="$1" href="javascript:void(0)" class="text-danger action-icon btn-actn-delete"><i class="mdi mdi-delete"></i></a>
				</center>','id_paket');
			return $this->datatables->generate();
		}	

}

/* End of file Outlet_model.php */
/* Location: ./application/models/Outlet_model.php */