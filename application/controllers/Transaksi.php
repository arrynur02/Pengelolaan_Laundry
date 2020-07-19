<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Datatables');
	}

	public function index()
	{
		$x['outlet'] = $this->db->get('tb_outlet')->result();
		$x['member'] = $this->db->get('tbl_member')->result();
		$this->load->view('component/bower_component');
		$this->load->view('App/Transaksi/Transaksi_view',$x);		
		$this->load->view('App/Transaksi/Modal_view');		
		$this->load->view('App/Transaksi/Javascript_view');		
	}
	public function getDatatables()
	{
		echo $this->Transaksi_model->getalldata_transaksi();
	}
	public function insert_transaksi()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$kode_invoice = $this->Transaksi_model->getKodeInvoice();
		$outlet = $this->input->post('outlet');
		$batas_waktu = $this->input->post('bw');
		$tgl_bayar = $this->input->post('tb');
		$member = $this->input->post('member');
		$biaya_tambahan = $this->input->post('bt');
		$pajak = $this->input->post('pajak');
		$diskon = $this->input->post('diskon');
		$user = $this->session->userdata('id_user');

		$ins1_ = [
			'id_outlet' => $outlet,
			'kode_invoice' => $kode_invoice,
			'id_member' => $member,
			'tgl' => date('d/m/y H:i:s'),
			'batas_waktu' => $batas_waktu,
			'tgl_bayar' => $tgl_bayar,
			'biaya_tambahan' => str_replace('.', '',$biaya_tambahan),
			'pajak' => str_replace('.', '',$pajak),
			'diskon' => $diskon,
			'status' => "baru",
			'dibayar' => "belum_dibayar",
			'id_user' => $user,
		];
		$this->db->insert('tb_transaksi', $ins1_);



	}
	public function getMemberBykeyword($keyword = NULL)
	{
		$keywords = $this->Transaksi_model->getBykeywordMember($keyword)->result_array();
		$n=1;
		foreach ($keywords as $wkey) {
			$encode['isi_tabel'][] = '<tr>
			<td>'.$n++.'</td>
			<td>'.$wkey['nama'].'</td>
			<td>'.$wkey['alamat'].'</td>
			<td>
			<input type="hidden" id="data_id-Nama_member" />
			<input onclick="clickSendId('.$wkey['id_member'].')" data-id="" type="radio" id="radio-checkmember-" name="member-trans" value="'.$wkey['id_member'].'">
			</td>
			</tr>';
		}
		echo json_encode($encode);
	}
	public function transaksi_()
	{
		date_default_timezone_set('Asia/Jakarta');
		$kode_invoice = $this->Transaksi_model->getKodeInvoice();
		$outlet = $this->input->post('outlet');
		$tgl = date('d/m/y H:i:s');
		$batas_waktu = $this->input->post('batas_waktu');
		$tgl_bayar = $this->input->post('tgl_bayar');
		$member = $this->input->post('member');
		$user = $this->session->userdata('id_user');

		$ins1_ = [
			'id_outlet' => $outlet,
			'kode_invoice' => $kode_invoice,
			'id_member' => $member,
			'tgl' => $tgl,
			'batas_waktu' => $batas_waktu,
			'tgl_bayar' => $tgl_bayar,
			// 'biaya_tambahan' => str_replace('.', '',$biaya_tambahan),
			// 'pajak' => str_replace('.', '',$pajak),
			// 'diskon' => $diskon,
			'status' => "baru",
			'dibayar' => "belum_dibayar",
			'id_user' => $user,
		];
		$ins_trans = $this->db->insert('tb_transaksi', $ins1_);
		$id_transaksi = $this->db->insert_id($ins_trans);

		$memberGet = $this->Transaksi_model->getMemberById($member)->row();

		$encode['kode_invoice'] = $kode_invoice;
		$encode['nama_member'] = $memberGet->nama;
		$encode['id_transaksi'] = $id_transaksi;
		echo json_encode($encode);
	}
	public function getdetailTransaksi_2($data_id = NULL)
	{
		$transaksi = $this->Transaksi_model->getByIdTrans_($data_id)->row();
		$encode['id_transaksi'] = $transaksi->id_transaksi;
		$encode['kode_invoice'] = $transaksi->kode_invoice;
		$encode['nama_member'] = $transaksi->nama_member;
		$encode['nama_user'] = $transaksi->nama_user;
		$encode['id_outlet'] = $transaksi->id_outlet;
		$encode['batas_waktu'] = $transaksi->batas_waktu;
		$encode['tgl_bayar'] = $transaksi->tgl_bayar;
		$encode['diskon'] = $transaksi->diskon;
		$encode['pajak'] = $transaksi->pajak;


		$dbgetOutlet = $this->Transaksi_model->getbyIdoutlet($transaksi->id_outlet)->result();
		foreach ($dbgetOutlet as $srow) {
			if ($srow->id_paket == "") {
				$encode['nama_paket'] = "";
			}else{
				$encode['nama_paket'][] = '<option value="'.$srow->id_paket.'">'.$srow->nama_paket.'</option>';
			}
		}

		echo json_encode($encode);
	}
	public function selectByOutlet($id_outlet = NULL)
	{
		$dbPaket = $this->db->get_where('tbl_paket', ['id_outlet'=>$id_outlet])->result();
		if (empty($dbPaket)) {
			$encode = "";
		}else{
			foreach ($dbPaket as $srow) {
				$encode[] = '<option value="'.$srow->id_paket.'">'.$srow->nama_paket.'</option>';
			}
		}
		echo json_encode($encode);
	}
	public function gettabeldetailTrans_($data_id = NULL)
	{
		// $id = $this->input->post("id");
		$dbgetTotalharga = $this->Transaksi_model->getTotalharga($data_id);
		foreach ($dbgetTotalharga as $srow) {
			$encode['total_jum'][] = $srow->total_harga*$srow->jumlah_qty;
		}

		$detail_transaksi = $this->Transaksi_model->getalldetailTrans($data_id)->result();
		$n=1;
		if (empty($detail_transaksi)) {
			$encode['data_tabel_detail_trans'] = "";
		}else{
			foreach ($detail_transaksi as $skey) {
				$encode['data_tabel_detail_trans'][] = '<tr id="tr_tabel-detailTrans-'.$skey->id.'">
				<td>'.$n++.'</td>
				<td>'.$skey->nama_paket.'</td>
				<td>'.$skey->jenis.'</td>
				<td>'.$skey->qty.'</td>
				<td> Rp. '.number_format($skey->harga).'</td>
				<td>'.$skey->keterangan.'</td>
				<td class="text-center"><a id_transaksi="'.$skey->id_transaksi.'" data_id="'.$skey->id.'" href="javascript:void(0)" class="text-danger btn-delete-detail_transaksi"><i class="mdi mdi-delete"></i></a></td>
				</tr>';
			// $encode['nama_paket'] = $skey->nama_paket;
			// $encode['qty'] = $skey->qty;
			// $encode['harga'] = $skey->harga;
			// $encode['keterangan'] = $skey->keterangan;
			}
		}
		echo json_encode($encode);
	}
	public function tambah_detailTrans()
	{
		$ins = [
			'id_transaksi' =>$this->input->post('id_transaksi'),
			'id_paket' =>$this->input->post('id_paket'),
			'qty' =>$this->input->post('qty'),
			'keterangan' =>$this->input->post('keterangan'),
		];
		$this->db->insert('tb_detail_transaksi', $ins);
	}
	public function delete_detail_transaksi($id = NULL)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_detail_transaksi');
	}
	public function edit_transaksi($id_transaksi = NULL)
	{
		$status_transaksi = $this->input->post('status_transaksi');
		$status_bayar = $this->input->post('status_bayar');
		$outlet = $this->input->post('outlet');
		$batas_waktu = $this->input->post('batas_waktu');
		$tgl_bayar = $this->input->post('tgl_bayar');
		$pajak = $this->input->post('pajak');
		$diskon = $this->input->post('diskon');

		$total_harga = $this->input->post('total_harga');

		$updt = [
			'id_outlet' => $outlet,
			'batas_waktu' => $batas_waktu,
			'tgl_bayar' => $tgl_bayar,
			'diskon' => $diskon,
			'pajak' => $pajak,
			'status' => $status_transaksi,
			'dibayar' => $status_bayar,
			'total_harga' => $total_harga,
		];

		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('tb_transaksi', $updt);
	}
	public function delete_transaksi_($id_transaksi = NULL)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('tb_transaksi');

		// $getDbdetail_trans = $this->db->get_where('tb_detail_transaksi',['id_transaksi'=>$id_transaksi])->result();

		// foreach ($getDbdetail_trans as $srow) {
		// 	$id_detail_trans[] = $srow->id_transaksi;
		// }

		// $this->db->where('id_transaksi', $id_detail_trans);
		// $this->db->delete('tb_detail_transaksi');
	}
	public function detail_invoice($id_transaksi = NULL)
	{
		$x['invoice'] = $this->Transaksi_model->getByIdTrans_($id_transaksi)->row();
		$x['detail_transaksi'] = $this->Transaksi_model->getalldetailTrans($id_transaksi)->result();
		$totalHarga_ = $this->Transaksi_model->getTotalharga($id_transaksi);
		$x['detailTrans_row'] = $this->Transaksi_model->getByIdTrans_($id_transaksi)->row();
		foreach ($totalHarga_ as $srow) {
			$x['total_harga'] = $srow->total_harga*$srow->qty;
		}
		$this->load->view('component/bower_component');
		$this->load->view('App/Transaksi/Transaksi_invoice',$x);		
		$this->load->view('App/Transaksi/Modal_view');		
		$this->load->view('App/Transaksi/Javascript_view');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */