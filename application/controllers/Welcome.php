<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', '', TRUE);
		//   $this->load->model('Munit','', TRUE);        
		$this->load->model('Minfo', '', TRUE);
		$this->load->model('Mpublik', '', TRUE);
		$this->load->model('Munit', '', TRUE);
	}
	public function index()
	{

		redirect('welcome/form_kategori');
	}

	public function getday($tgl)
	{
		$sepparator = '-'; //separator. contoh: '-', '/'
		$parts = explode($sepparator, $tgl); //2002-12-21 --> 21-12-2002
		$d = date("l", mktime(0, 0, 0, $parts[1], $parts[0], $parts[2]));

		if ($d == 'Monday') {
			return 'Senin';
		} elseif ($d == 'Tuesday') {
			return 'Selasa';
		} elseif ($d == 'Wednesday') {
			return 'Rabu';
		} elseif ($d == 'Thursday') {
			return 'Kamis';
		} elseif ($d == 'Friday') {
			return 'Jumat';
		} elseif ($d == 'Saturday') {
			return 'Sabtu';
		} elseif ($d == 'Sunday') {
			return 'Minggu';
		} else {
			return 'ERROR!';
		}
	}
	public function index_lama()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'publik/awal';

			$this->load->view('publik/beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function profil($e = null)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'profil';
			$data['edit'] = $e;
			$data['b'] = '';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$this->load->view('beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function daftar()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'publik/daftar_komplain';

			$this->load->view('publik/beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function ganti_pass()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'gantipass';
			$data['b'] = '';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$this->load->view('beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function rinci_keluhan_user($id, $ra = NULL)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['id_com'] = $id;
			$data['ra'] = $ra;
			$data['view'] = 'publik/daftar_rinci_komplain';

			$this->load->view('publik/beranda', $data);
		} else {
			redirect('login');
		}
	}
	public function form_kategori($id_k = 1, $uru = NULL)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$w = $this->Mpublik->get_id_kat($id_k)->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['jud_kat'] = !empty($w->nama) ? $w->nama : 'Kategori';
			$data['id_k'] = $id_k;
			$data['uru'] = $uru;
			$data['title'] = 'Selamat Datang Nasabah';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'publik/form_komplen';
			$this->load->view('publik/beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function simpan_edit_profil()
	{
		$q = array(
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
			'unit' => $this->input->post('unit'),
			'no' => $this->input->post('no'),
		);

		$this->Mpublik->update_profil($q, $this->session->userdata('id_user'));
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                    <p>Data Berhasil Diperbaharui</p>
                </div>'
		);
		//redirect('welcome/form_kategori/'.$id_k);
		redirect('welcome/profil');
	}

	public function simpan_ganti_pass()
	{
		$q = array(
			'username' => $this->input->post('user'),
			'password' => $this->input->post('pass'),
		);

		$this->Mpublik->update_profil($q, $this->session->userdata('id_user'));
		$this->session->set_userdata('login', FALSE);
		$this->session->set_userdata('master_login', FALSE);
		$this->session->set_userdata('id_login', FALSE);
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', 'Silahkan Login Kembali');
		redirect("login/");
	}

	public function simpan_complin()
	{
		if ($this->session->userdata('login') == TRUE) {


			//$id_k= $this->input->post('id_k');
			//$id_k_sub=0;
			//$id_k_sub= $this->input->post('id_k');
			$id_k_sub = $this->input->post('jenis');
			$id_k = $this->Munit->get_all_kategori_sub($id_k_sub)->row()->id_k; //get sattus no 1

			$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
			$hm = $h * 60;
			$ms = $hm * 60;
			$tgl = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
			$hari = $this->getday($tgl);
			$waktu = gmdate("H:i:s", time() + ($ms));
			$d = gmdate("d", time() + ($ms));
			$b = gmdate("m", time() + ($ms));
			$y = gmdate("Y", time() + ($ms));
			$get = $this->Login_model->getalluser_perid();
			///upload file
			$this->load->library('upload');
			$nmfile = "image_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './upload/'; //path folder anpa di kurangi
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '0'; //maksimum besar file 2M
			//$config['max_width']  = '1288'; //lebar maksimum 1288 px
			//$config['max_height']  = '768'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
			$config['max_filename'] = 200;
			$this->upload->initialize($config);
			date_default_timezone_set("Asia/Jakarta");

			if ($_FILES['file']['name']) {
				if ($this->upload->do_upload('file')) {
					$gbr = $this->upload->data();
					$q = array(
						'nama' => $get->row()->nama,
						'jabatan' => $get->row()->jabatan,
						'unit' => $get->row()->unit,
						'no' => $get->row()->no,
						'email' => $get->row()->username,

						'judul' => $this->input->post('judul'),
						'complain' => $this->input->post('com'),
						'tgl' => $hari . ', ' . $tgl . ' ' . $waktu,
						'file' => $gbr['file_name'],
						'id_k' => $id_k,
						'id_k_sub' => $id_k_sub,
						'date' => $d,
						'bln' => $b,
						'thn' => $y,
						'status' => 1, //1=terkirim
						'id_user' => $this->session->userdata('id_user'),
					);

					$this->Mpublik->simpan_com($q);
					$this->session->set_flashdata(
						'msg',
						'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                    <p>Data Berhasil Dikirim</p>
                </div>'
					);
					//redirect('welcome/form_kategori/'.$id_k);
					redirect('welcome/daftar');
				}
			} else { //tidak ada file

				$q = array(
					'nama' => $get->row()->nama,
					'jabatan' => $get->row()->jabatan,
					'unit' => $get->row()->unit,
					'no' => $get->row()->no,
					'email' => $get->row()->username,

					'judul' => $this->input->post('judul'),
					'complain' => $this->input->post('com'),
					'tgl' => $hari . ', ' . $tgl . ' ' . $waktu,
					'id_k' => $id_k,
					'id_k_sub' => $id_k_sub,
					'date' => $d,
					'bln' => $b,
					'thn' => $y,
					'status' => 1, //1=terkirim
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->Mpublik->simpan_com($q);
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                    <p>Data Berhasil Dikirim</p>
                </div>'
				);
				//redirect('welcome/form_kategori/'.$id_k);
				redirect('welcome/daftar');
			} //file disisi tapi ad yg salah


		} else {
			redirect('login');
		}
	}

	public function edit_complin_foto($id)
	{
		if ($this->session->userdata('login') == TRUE) {

			$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
			$hm = $h * 60;
			$ms = $hm * 60;
			$tgl = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
			$waktu = gmdate("H:i:s", time() + ($ms));
			$d = gmdate("d", time() + ($ms));
			$b = gmdate("m", time() + ($ms));
			$y = gmdate("Y", time() + ($ms));
			$get = $this->Login_model->getalluser_perid();
			///upload file
			$this->load->library('upload');
			$nmfile = "image_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './upload/'; //path folder anpa di kurangi
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '0'; //maksimum besar file 2M
			//$config['max_width']  = '1288'; //lebar maksimum 1288 px
			//$config['max_height']  = '768'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
			$config['max_filename'] = 200;
			$this->upload->initialize($config);
			date_default_timezone_set("Asia/Jakarta");

			if ($_FILES['file']['name']) {
				if ($this->upload->do_upload('file')) {
					$gbr = $this->upload->data();
					$q = array(

						'file' => $gbr['file_name'],
					);

					$this->Mpublik->simpan_edit_com($q, $id);
					$this->session->set_flashdata(
						'msg',
						'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                    <p>Data Berhasil Dikirim</p>
                </div>'
					);
					//redirect('welcome/form_kategori/'.$id_k);
					redirect('welcome/rinci_keluhan_user/' . $id);
				}
			}


			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
                    <h4>GAGAL</h4>
                    <p>Data Gagal disimpan</p>
                </div>'
			);
			//redirect('welcome/form_kategori/'.$id_k);
			redirect('welcome/rinci_keluhan_user/' . $id);
		} else {
			redirect('login');
		}
	}

	public function edit_complin($id)
	{
		if ($this->session->userdata('login') == TRUE) {

			$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
			$hm = $h * 60;
			$ms = $hm * 60;
			$tgl = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
			$waktu = gmdate("H:i:s", time() + ($ms));
			$d = gmdate("d", time() + ($ms));
			$b = gmdate("m", time() + ($ms));
			$y = gmdate("Y", time() + ($ms));

			$get = $this->Login_model->getalluser_perid();

			$q = array(

				'judul' => $this->input->post('judul'),
				'complain' => $this->input->post('com'),
			);

			$this->Mpublik->simpan_edit_com($q, $id);
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                    <p>Data Berhasil Dikirim</p>
                </div>'
			);
			//redirect('welcome/form_kategori/'.$id_k);
			redirect('welcome/rinci_keluhan_user/' . $id);
		} else {
			redirect('login');
		}
	}

	function save_ranting($id)
	{
		$q = array(

			'star' => $this->input->post('rating'),
		);

		$this->Mpublik->simpan_edit_com($q, $id);
		//redirect('Welcome/rinci_keluhan_user/'.$id);
		redirect('Welcome/daftar');
	}
}
