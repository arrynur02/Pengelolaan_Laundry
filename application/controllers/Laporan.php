<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
	}
	public function index()
	{
		$x['title'] = '<h4 class="text-center">Pengelolaan Laundry</h4><hr>';
		if ($this->session->userdata('role') == "owner") {
			$x['outlet'] = $this->db->get('tb_outlet')->result();
			$this->load->view('component/bower_component');
			$this->load->view('App/Laporan/Laporan_Owner', $x);
		}elseif ($this->session->userdata('role') == "admin") {
			$x['transaksi'] = $this->Transaksi_model->getalldata_transaksi_laporan()->result();
			$this->load->view('component/bower_component');
			$this->load->view('App/Laporan/Laporan_Admin', $x);
		}elseif ($this->session->userdata('role') == "kasir") {
			$x['transaksi'] = $this->Transaksi_model->getalldata_transaksi_laporan()->result();
			$this->load->view('component/bower_component');
			$this->load->view('App/Laporan/Laporan_Kasir', $x);
		}		
			$this->load->view('App/Laporan/Javascript_view');
	}
	public function eksport_pdf()
	{
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,TRUE, 'UTF-8', false);
		$pdf->setPrintFooter(false);
		$pdf->setPrintHeader(false);
		$pdf->SetAutoPageBreak(true,PDF_MARGIN_BOTTOM);
		$pdf->AddPage('');
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		// $pdf->write(0,'Laporan Data Perpustakaan','',0,'L',true,0,false);
		$pdf->SetFont('helvetica', '', 14, '', true);

		$pdf->writeHTML($laporan_content);
		$pdf->Output('Laporan.pdf','I');	
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */