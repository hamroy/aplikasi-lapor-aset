<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_eksekutif extends CI_Controller
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
		$this->load->model('M_eksekutif', '', TRUE);
		$this->load->model('Munit', '', TRUE);
	}
	public function index()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['id_k'] = $this->session->userdata('id_k');
			$data['a'] = 'active';
			$data['b'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';

			if ($this->session->userdata('login') == 1) {
				$data['view'] = 'eksekutif/daftar_komplain_now_aset';
			} else {
				$data['view'] = 'eksekutif/daftar_komplain_now';
			}



			$this->load->view('eksekutif/beranda', $data);
		} else {
			redirect('login');
		}
	}

	//RINCI KATEGORI
	public function rinci_kategori($st, $id_k)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['id_k'] = $id_k;
			$data['b'] = 'active';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			switch ($st) {
				case '1':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_now_all($id_k); //get sattus no 1
					$data['bt'] = 'Sekarang'; //get sattus no 1
					break;
				case '2':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_blm_dibaca_all($id_k); //get sattus no 1
					$data['bt'] = 'Belum Ditanggapi'; //get sattus no 1
					break;
				case '3':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_proses_all($id_k); //get sattus no 1
					$data['bt'] = 'Proses'; //get sattus no 1
					break;
				case '4':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_finis_all($id_k); //get sattus no 1
					$data['bt'] = 'Selesai'; //get sattus no 1
					break;
				default:
					break;
			}

			$data['view'] = 'eksekutif/rinci_kategori';

			$this->load->view('eksekutif/beranda', $data);
		} else {
			redirect('login');
		}
	}
	//RINCI KATEGORI
	public function rinci_kategori_subtot($id_k)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['id_k'] = $id_k;
			$data['b'] = 'active';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['now1'] = $this->M_eksekutif->get_seluhanunit_finis_all_peridk($id_k); //get sattus no 1
			$data['bt'] = 'Semua'; //get sattus no 1
			$data['view'] = 'eksekutif/rinci_kategori';

			$this->load->view('eksekutif/beranda', $data);
		} else {
			redirect('login');
		}
	}

	//RINCI KATEGORI ALL
	public function rinci_kategori_all($st)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['b'] = 'active';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			switch ($st) {
				case '1':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_now_all_noid(); //get sattus no 1
					$data['bt'] = 'Sekarang'; //get sattus no 1
					break;
				case '2':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_all_id_status_peridsttus_plus(2); //get sattus no 1
					$data['bt'] = 'Belum Ditanggapi'; //get sattus no 1
					break;
				case '3':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_all_id_status_peridsttus(3); //get sattus no 1
					$data['bt'] = 'Proses'; //get sattus no 1
					break;
				case '4':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_all_id_status_peridsttus(4); //get sattus no 1
					$data['bt'] = 'Selesai'; //get sattus no 1
					break;
				case '5':
					$data['now1'] = $this->M_eksekutif->get_seluhanunit_all_id_status(4); //get sattus no 1
					$data['bt'] = 'Semua'; //get sattus no 1
					break;
				default:
					break;
			}

			$data['view'] = 'eksekutif/rinci_kategori_all';

			$this->load->view('eksekutif/beranda', $data);
		} else {
			redirect('login');
		}
	}

	//d_hariini
	public function d_hariini()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['b'] = 'active';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'eksekutif/daftar_komplain_now';

			$this->load->view('unit/beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function rinci_keluhan($id)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['a'] = 'active';
			$data['b'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['id_com'] = $id;
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'unit/daftar_rinci_komplain';

			$this->load->view('unit/beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function rinci_keluhan_user($id)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['id_com'] = $id;
			$data['view'] = 'eksekutif/daftar_rinci_komplain';

			$this->load->view('eksekutif/beranda', $data);
		} else {
			redirect('login');
		}
	}

	//proses
	public function proses()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['c'] = 'active';
			$data['a'] = '';
			$data['b'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'unit/daftar_komplain_proses';

			$this->load->view('unit/beranda', $data);
		} else {
			redirect('login');
		}
	}
	//finis
	public function finis()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['d'] = 'active';
			$data['a'] = '';
			$data['b'] = '';
			$data['c'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'unit/daftar_komplain_finish';

			$this->load->view('unit/beranda', $data);
		} else {
			redirect('login');
		}
	}


	////===============================proses

	function proses_buat_tiket($id, $pos = NULL)
	{
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tgl = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		$waktu = gmdate("H:i:s", time() + ($ms));
		$d = gmdate("d", time() + ($ms));
		$b = gmdate("m", time() + ($ms));
		$y = gmdate("Y", time() + ($ms));

		$getidall = $this->Mpublik->get_seluhanall();
		if ($getidall->num_rows() > 0) {
			foreach ($getidall->result() as $a) {
				$ah = $a->id;
			}
		}

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

				$aha = $ah + 1;
				$getnambiro = $this->Mpublik->get_getnamauser($this->session->userdata('id_user'))->row()->wilayah;

				///BUat NNOTA

				$q = array(
					//'tgl'=>$tgl,
					'status' => 3, //3=Diproses
					'id_tiket' => $aha . '' . $getnambiro,
				);

				$this->Mpublik->up_com($q, $id);

				///Nyimpan data 

				$p = array(
					'tgl_kom' => $tgl,
					'id_com' => $id,
					'file' => $gbr['file_name'],
					'tanggapan' => $this->input->post('com'),
					'id_user' => $this->session->userdata('id_user'),
				);



				$this->Mpublik->insert_com($p);
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-success">
                    <p>Data Berhasil Dikirim</p>
                </div>'
				);

				if ($pos == NULL) {
					redirect('C_biro/rinci_keluhan/' . $id);
				} else {
					redirect('Welcome/rinci_keluhan_user/' . $id);
				}
			}
		}
	}

	////===============================proses

	function proses_disposisi($id)
	{ //merubah status=disposisi ,,,id_k(ketegori)=5
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tgl = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		$waktu = gmdate("H:i:s", time() + ($ms));
		$d = gmdate("d", time() + ($ms));
		$b = gmdate("m", time() + ($ms));
		$y = gmdate("Y", time() + ($ms));






		///BUat NNOTA

		$q = array(
			//'tgl'=>$tgl,
			'status' => 1, //5=Disposisi
			'id_k' => $this->input->post('t7'), //5=Disposisi
		);

		$this->Mpublik->up_com($q, $id);

		///Nyimpan data 
		$gelidkat = $this->Mpublik->get_id_kategori($this->input->post('t7'));
		$p = array(
			'tgl_kom' => $tgl,
			'id_com' => $id,
			'tanggapan' => 'Disposisi ke ' . $gelidkat->row()->nama,
			'id_user' => $this->session->userdata('id_user'),
		);



		$this->Mpublik->insert_com($p);
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <p>Data Berhasil Dikirim</p>
                </div>'
		);

		redirect('C_biro/rinci_keluhan/' . $id);
	}

	////===============================proses

	function proses_selesai($id)
	{
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tgl = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		$waktu = gmdate("H:i:s", time() + ($ms));
		$d = gmdate("d", time() + ($ms));
		$b = gmdate("m", time() + ($ms));
		$y = gmdate("Y", time() + ($ms));

		$getidall = $this->Mpublik->get_seluhanall();
		if ($getidall->num_rows() > 0) {
			foreach ($getidall->result() as $a) {
				$ah = $a->id;
			}
		}



		$aha = $ah + 1;
		$getnambiro = $this->Mpublik->get_getnamauser($this->session->userdata('id_user'))->row()->wilayah;

		///BUat NNOTA

		$q = array(
			'tgl_selesai' => $tgl,
			'status' => 4, //4=SELESAI
			'id_tiket' => $aha . '' . $getnambiro,
		);

		$this->Mpublik->up_com($q, $id);


		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <p>Data Berhasil Dikirim</p>
                </div>'
		);

		redirect('C_biro/rinci_keluhan/' . $id);
	}
}
