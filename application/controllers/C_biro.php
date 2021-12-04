<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_biro extends CI_Controller
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
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['a'] = 'active';
			$data['b'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'unit/daftar_komplain';

			$this->load->view('unit/beranda', $data);
		} else {
			redirect('login');
		}
	}

	//DATAR CARI RINCi
	public function cari_rinci()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['cari'] = $cari = $this->input->post('cari');
			$id_k = $this->session->userdata('id_k');
			if (!empty($cari)) {

				$q1 = $this->Minfo->get_cari_idtrafik_idk($cari, $id_k);
				$q2 = $this->Minfo->get_cari_judul_idk($cari, $id_k);
				if ($q1->num_rows() > 0) {
					$data['get'] = $q1;
					$data['geta'] = 'ada_id.trafik';
				} else {
					$data['get'] = $q2;
					$data['geta'] = 'ada judul';
				}
			} else {
				$data['geta'] = 'kosong';
			}



			$data['b'] = 'active';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'unit/cari';

			$this->load->view('unit/beranda', $data);
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
			$data['view'] = 'unit/daftar_komplain_now';

			$this->load->view('unit/beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function sub_kategori()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['e'] = 'active';
			$data['b'] = '';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['id_k'] = $this->session->userdata('id_k');
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'unit/sub_kategori';

			$this->load->view('unit/beranda', $data);
		} else {
			redirect('login');
		}
	}
	public function sub_urusan($id_uru)
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['e'] = 'active';
			$data['b'] = '';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['id_k'] = $this->session->userdata('id_k');
			$data['id_uru'] = $id_uru;
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'unit/sub_urusan';

			$this->load->view('unit/beranda', $data);
		} else {
			redirect('login');
		}
	}

	public function daftar_khusus_aset()
	{
		if ($this->session->userdata('login') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['f'] = 'active';
			$data['e'] = '';
			$data['b'] = '';
			$data['a'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['id_k'] = $this->session->userdata('id_k');
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'unit/daftar_useraset';

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
		$hari = $this->getday($tgl);
		$waktu = gmdate("H:i:s", time() + ($ms));
		$d = gmdate("d", time() + ($ms));
		$b = gmdate("m", time() + ($ms));
		$y = gmdate("Y", time() + ($ms));

		//$getidall=$this->Mpublik->get_seluhanall();
		$getidall = $this->Mpublik->get_seluhanall_max();

		///jika sudah buat tiket maka tidak buat lagi
		$get_perid = $this->Mpublik->get_lis_keluhan($id);
		$getnambiro = $this->Mpublik->get_getnamauser($this->session->userdata('id_user'))->row()->wilayah;
		if (empty($get_perid->row()->id_tiket)) {
			$tamah = $getidall + 1;
			$ah = $tamah . '' . $getnambiro;
			$id_tiket = $tamah;
		} else {
			$ah = $get_perid->row()->id_tiket;
			$id_tiket = $get_perid->row()->id_t;
		}
		///jika sudah buat tiket maka tidak buat lagi //*/



		////
		if ($pos == NULL) {
			$pro = $this->input->post('pr');
			//$subkat=$this->input->post('subkat');	
			$p_jawab = $this->input->post('p_jawab');
		} else {
			//$subkat='';	
			$pro = '';
			$p_jawab = '';
		}
		////

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

				$aha = $ah;


				///BUat NNOTA

				$q = array(
					//'tgl'=>$tgl,
					'status' => 3, //3=Diproses
					'id_tiket' => $aha,
					'id_t' => $id_tiket,
					//'id_k_sub'=>$subkat,
					'p_jawab' => $p_jawab,
				);

				$this->Mpublik->up_com($q, $id);

				///Nyimpan data 

				$p = array(
					'tgl_kom' => $hari . ', ' . $tgl . ' ' . $waktu,
					'id_com' => $id,
					'progres' => $pro,
					'p_jawab' => $p_jawab,
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
		} else { //tidak ada file
			$aha = $ah;
			//$getnambiro=$this->Mpublik->get_getnamauser($this->session->userdata('id_user'))->row()->wilayah;

			///BUat NNOTA

			$q = array(
				//'tgl'=>$tgl,
				'status' => 3, //3=Diproses
				'id_tiket' => $aha,
				'id_t' => $id_tiket,
				//'id_k_sub'=>$subkat,
				'p_jawab' => $p_jawab,
			);

			$this->Mpublik->up_com($q, $id);

			///Nyimpan data 

			$p = array(
				'tgl_kom' => $hari . ', ' . $tgl . ' ' . $waktu,
				'id_com' => $id,
				'progres' => $pro,
				'p_jawab' => $p_jawab,
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
			'tgl_kom' => 0,
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

		//$getidall=$this->Mpublik->get_seluhanall();
		$getidall = $this->Mpublik->get_seluhanall_max();

		///jika sudah buat tiket maka tidak buat lagi
		$get_perid = $this->Mpublik->get_lis_keluhan($id);
		$getnambiro = $this->Mpublik->get_getnamauser($this->session->userdata('id_user'))->row()->wilayah;
		if (empty($get_perid->row()->id_tiket)) {
			$tamah = $getidall + 1;
			$ah = $tamah . '' . $getnambiro;
			$id_tiket = $tamah;
		} else {
			$ah = $get_perid->row()->id_tiket;
			$id_tiket = $get_perid->row()->id_t;
		}

		///BUat NNOTA

		$q = array(
			'tgl_selesai' => 0,
			'status' => 4, //4=SELESAI
			'id_tiket' => $ah,
			'id_t' => $id_tiket,
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

	function proses_buat_Sub_kategori($id_k)
	{
		$d = array(
			'nama_sub' => $this->input->post('sub'),
			'id_k' => $id_k,
		);
		$this->Munit->insert_sub_kategori($d);
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <p>Data Berhasil Disimpan</p>
                </div>'
		);
		redirect('C_biro/sub_kategori');
	}
	function proses_buat_Sub_urusan($id_uru)
	{
		$d = array(
			'nama_jenis' => $this->input->post('sub'),
			'id_uru' => $id_uru,
		);
		$this->Munit->insert_sub_urusan($d);
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <p>Data Berhasil Disimpan</p>
                </div>'
		);
		redirect('C_biro/sub_urusan/' . $id_uru);
	}
	function proses_buat_edit_Sub_kategori($id)
	{
		$d = array(
			'nama_sub' => $this->input->post('sub'),
			//'id_k'=>$id_k,
		);
		$this->Munit->update_sub_kategori($id, $d);
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <p>Data Berhasil Disimpan</p>
                </div>'
		);
		redirect('C_biro/sub_kategori');
	}
	function proses_buat_edit_Sub_urusan($id, $id_uru)
	{
		$d = array(
			'nama_jenis' => $this->input->post('sub'),
			//'id_k'=>$id_k,
		);
		$this->Munit->update_sub_urusan($id, $d);
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <p>Data Berhasil Disimpan</p>
                </div>'
		);
		redirect('C_biro/sub_urusan/' . $id_uru);
	}
	function proses_hapus_subkategori($id)
	{

		$this->Munit->del_sub_kategori($id);
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <p>Data Berhasil Disimpan</p>
                </div>'
		);
		redirect('C_biro/sub_kategori');
	}
	function proses_hapus_sub_urusan($id, $id_uru)
	{

		$this->Munit->del_sub_urusan($id);
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <p>Data Berhasil Disimpan</p>
                </div>'
		);
		redirect('C_biro/sub_urusan/' . $id_uru);
	}
}
