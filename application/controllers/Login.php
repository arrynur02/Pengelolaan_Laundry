<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('Login/Login_view');
	}
	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$proses = $this->M_user->login($username,$password);

		// $proses = $proses;

		if ($proses->num_rows() != "") {
			if ($proses == TRUE) {
				foreach ($proses->result_array() as $sess) {
					$sess_array = [
						'id_user'  => $sess['id_user'],
						'nama'     => $sess['nama'],
						'username' => $sess['username'],
						'password' => $sess['password'],
						'role' => $sess['role']];
				}
				$this->session->set_userdata( $sess_array );
			}

			if ($this->session->userdata('role') == "admin") {
							$this->session->set_userdata('refresh','Halaman-Admin');
							$this->session->set_flashdata('welcome','
					        <script src="'.base_url('assets/js/vendor.min.js').'"></script>
        					<script src="'.base_url('assets/js/app.min.js').'"></script>
							<script>$(function(){$.NotificationApp.send("Admin","Selamat Datang Di Halaman '.$this->session->userdata('nama').'","top-right","rgba(0,0,0,0.2)","success")})</script>');
				// redirect('Halaman-Admin','refresh',$welcome);
				echo '<script>document.location.href="'.base_url('Halaman-Admin').'"</script>';
			}elseif ($this->session->userdata('role') == "kasir") {
							$this->session->set_userdata('refresh','Halaman-Kasir');
							$this->session->set_flashdata('welcome','
					        <script src="'.base_url('assets/js/vendor.min.js').'"></script>
        					<script src="'.base_url('assets/js/app.min.js').'"></script>
							<script>$(function(){$.NotificationApp.send("Kasir","Selamat Datang Di Halaman '.$this->session->userdata('nama').'","top-right","rgba(0,0,0,0.2)","warning")})</script>');
				// redirect('Halaman-Kasir','refresh',$welcome);
				echo '<script>document.location.href="'.base_url('Halaman-Kasir').'"</script>';
			}elseif ($this->session->userdata('role') == "owner") {
							$this->session->set_userdata('refresh','Halaman-Owner');
					 		$this->session->set_flashdata('welcome','
					        <script src="'.base_url('assets/js/vendor.min.js').'"></script>
        					<script src="'.base_url('assets/js/app.min.js').'"></script>
							<script>$(function(){$.NotificationApp.send("Owner","Selamat Datang Di Halaman '.$this->session->userdata('nama').'","top-right","rgba(0,0,0,0.2)","info")})</script>');
				// redirect('Halaman-Owner','refresh',$welcome);
				echo '<script>document.location.href="'.base_url('Halaman-Owner').'"</script>';
			}
		}else{
			redirect('Login');
		}
	}
	public function user_log_out()
	{
		$this->sess_destroy();
		redirect('Login');
	}
	public function sess_destroy()
	{
		$this->session->sess_destroy();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */