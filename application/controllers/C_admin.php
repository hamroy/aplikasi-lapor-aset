<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
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
			$data['a'] = 'active';
			$data['b'] = '';
			$data['c'] = '';
			$data['d'] = '';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$data['view'] = 'admin/tambahk';

			$this->load->view('admin/beranda', $data);
		} else {
			redirect('login');
		}
	}
	public function daftar_unit()
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
			$data['view'] = 'admin/daftar_unit';

			$this->load->view('admin/beranda', $data);
		} else {
			redirect('login');
		}
	}
	public function simpan_pluss_kat()
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

				'nama' => $this->input->post('kat'),
			);
			$this->M_eksekutif->insert_kat($q);
			$id_k = $this->M_eksekutif->get_idterbesar();

			$qq = array(

				'nama' => $this->input->post('kat'),
				'username' => $this->input->post('user'),
				'password' => $this->input->post('pass'),
				'id_k' => $id_k,
				'wewenang' => 'unit',
				'block' => '1',
			);


			$this->M_eksekutif->insert_kat_duser($qq);
			///
			$q2 = array(

				'nama_sub' => $this->input->post('kat'),
				'id_k' => $id_k,
			);
			$this->Munit->insert_sub_kategori($q2);
			//

			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                    <p>Data Berhasil Dikirim</p>
                </div>'
			);
			//redirect('welcome/form_kategori/'.$id_k);
			redirect('C_admin');
		} else {
			redirect('login');
		}
	}
}
