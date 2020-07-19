<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function getalldata_transaksi()
	{
		$this->datatables->select('id_transaksi,kode_invoice,tgl,batas_waktu,tgl_bayar,biaya_tambahan,diskon,pajak,status,dibayar,tb_outlet.id_outlet,nama_outlet,tb_outlet.alamat As alamat_outlet,tb_outlet.tlp As tlp_outlet,tbl_member.id_member,tbl_member.nama As nama_member,tbl_member.alamat As alamat_member,jenis_kelamin,tbl_member.tlp As tlp_member,tb_user.id_user,tb_user.nama As nama_user,role');
		$this->datatables->from('tb_transaksi');
		$this->datatables->join('tb_outlet', 'tb_outlet.id_outlet = tb_transaksi.id_outlet', 'left');
		$this->datatables->join('tbl_member', 'tbl_member.id_member = tb_transaksi.id_member', 'left');
		$this->datatables->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user', 'left');
		$this->datatables->add_column('aksi','
			<center>
			<a data1="$1" data-target="'.base_url('Transaksi/detail_invoice/$1').'" href="javascript:void(0)" class="text-primary action-icon btn-zoom-transaksi"><i class="mdi mdi-magnify-plus"></i></a> | 
			<a data1="$1" href="javascript:void(0)" class="text-primary action-icon btn-edit-transaksi"><i class="mdi mdi-pencil"></i></a> | 
			<a data_id="$1" href="javascript:void(0)" class="text-danger action-icon btn-delete-transaksi"><i class="mdi mdi-delete"></i></a>
			</center>','id_transaksi');
		return $this->datatables->generate();
	}
	public function getalldata_transaksi_laporan()
	{
		$this->db->select('id_transaksi,kode_invoice,tgl,batas_waktu,tgl_bayar,biaya_tambahan,diskon,pajak,status,dibayar,tb_outlet.id_outlet,nama_outlet,tb_outlet.alamat As alamat_outlet,tb_outlet.tlp As tlp_outlet,tbl_member.id_member,tbl_member.nama As nama_member,tbl_member.alamat As alamat_member,jenis_kelamin,tbl_member.tlp As tlp_member,tb_user.id_user,tb_user.nama As nama_user,role');
		$this->db->from('tb_transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$this->db->join('tb_outlet', 'tb_outlet.id_outlet = tb_transaksi.id_outlet', 'left');
		$this->db->join('tbl_member', 'tbl_member.id_member = tb_transaksi.id_member', 'left');
		$this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user', 'left');
		return $this->db->get();
	}
	public function getKodeInvoice()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(kode_invoice,4)) AS kd_max FROM tb_transaksi WHERE DATE(tgl)=CURDATE()");
		$kd = "";
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$tmp = ((int)$k->kd_max)+1;
				$kd = sprintf("%04s", $tmp);
			}
		}else{
			$kd = "0001";
		}
		date_default_timezone_set('Asia/Jakarta');
		return date('dmy').$kd;
	}
	public function getBykeywordMember($keyword)
	{
		$this->db->like('nama', $keyword);
		return $this->db->get('tbl_member');
	}
	public function getMemberById($member)
	{
		$this->db->where('id_member', $member);
		return $this->db->get('tbl_member');
	}
	public function getByIdTrans_($data_id)
	{
		$this->db->select('id_transaksi,kode_invoice,tgl,batas_waktu,tgl_bayar,biaya_tambahan,diskon,pajak,status,dibayar,tb_outlet.id_outlet,nama_outlet,tb_outlet.alamat As alamat_outlet,tb_outlet.tlp As tlp_outlet,tbl_member.id_member,tbl_member.nama As nama_member,tbl_member.alamat As alamat_member,jenis_kelamin,tbl_member.tlp As tlp_member,tb_user.id_user,tb_user.nama As nama_user,role');
		$this->db->from('tb_transaksi');
		$this->db->where('id_transaksi', $data_id);
		$this->db->join('tb_outlet', 'tb_outlet.id_outlet = tb_transaksi.id_outlet', 'left');
		$this->db->join('tbl_member', 'tbl_member.id_member = tb_transaksi.id_member', 'left');
		$this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user', 'left');
		return $this->db->get();
	}
	public function getbyIdoutlet($outlet)
	{
		$this->db->where('id_outlet', $outlet);
		return $this->db->get('tbl_paket');
	}
	public function getalldetailTrans($data_id)
	{
		$this->db->select('id,tb_transaksi.id_transaksi,tbl_paket.id_paket,nama_paket,harga,jenis,qty,keterangan');
		$this->db->order_by('id', 'desc');
		$this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi', 'left');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tb_detail_transaksi.id_paket', 'left');
		$this->db->where('tb_transaksi.id_transaksi', $data_id);
		return $this->db->get('tb_detail_transaksi');
	}
	public function getTotalharga($data_id)
	{
		$this->db->select('id,tb_transaksi.id_transaksi,tbl_paket.id_paket,nama_paket,harga,SUM(harga) As total_harga,jenis,qty,SUM(qty) As jumlah_qty,keterangan');
		$this->db->order_by('id', 'desc');
		$this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi', 'left');
		$this->db->join('tbl_paket', 'tbl_paket.id_paket = tb_detail_transaksi.id_paket', 'left');
		$this->db->where('tb_transaksi.id_transaksi', $data_id);
		$query = $this->db->get('tb_detail_transaksi')->result();
		return $query;
	}
	public function getTotalhargapaket($id_paket)
	{
		$this->db->select('id_paket,jenis,harga,SUM(harga) AS total_harga');
		$this->db->group_by('id_paket');
		return $this->db->get_where('tbl_paket', ['id_paket' => $id_paket]);
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */