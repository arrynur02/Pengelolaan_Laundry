<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Datatables');
	}

	public function index()
	{
		$x['outlet'] = $this->db->get('tb_outlet')->result();
		$this->load->view('component/bower_component');
		$this->load->view('App/Produk/Produk_view',$x);
		$this->load->view('App/Produk/Modal_view');
		$this->load->view('App/Produk/Javascript_view');
	}
	public function getall_dt()
	{
		echo $this->Outlet_model->getalldata();
	}
	public function ins_produk()
	{
		$ins = [
			'id_outlet' => $this->input->post('outlet'),
			'nama_paket' => $this->input->post('nama'),
			'jenis' => $this->input->post('jenis'),
			'harga' => str_replace('.', '',$this->input->post('harga')),
		];
		$this->db->insert('tbl_paket', $ins);
	}
	public function delete_produk($id = NULL)
	{
		$this->db->where('id_paket', $id);
		$this->db->delete('tbl_paket');
	}
	public function getById($data_id = NULL)
	{
		$paket = $this->db->get_where('tbl_paket', array('id_paket' => $data_id))->result_array();

			foreach ($paket as $srow) {
				$result['id_paket'] = $srow['id_paket'];
				$result['id_outlet'] = $srow['id_outlet'];
				$result['nama_paket'] = $srow['nama_paket'];
				$result['jenis'] = $srow['jenis'];
				$result['harga'] = $srow['harga'];
			}
			echo json_encode($result);
	}
	public function update_produk($data_id = NULL)
	{
		$updt = [
			'id_outlet' => $this->input->post('outlet'),
			'nama_paket' => $this->input->post('nama'),
			'jenis' => $this->input->post('jenis'),
			'harga' => str_replace('.', '',$this->input->post('harga')),
		];

		$this->db->where('id_paket', $data_id);
		$this->db->update('tbl_paket', $updt);
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */