<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', '', TRUE);
		//   $this->load->model('Munit','', TRUE);        
		$this->load->model('Minfo', '', TRUE);
	}



	function index()
	{
		$q = $this->Minfo->info()->row();
		$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
		$data['title'] = 'Selamat Datang Nasabah';
		$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
		$data['sim'] = 'SIMPEG';
		$data['simlong'] = $q->namapt;
		$data['warna'] = '#065139';
		$data['warna2'] = '#fbc800';
		//$data['info']=$this->Minfo->info()->row();
		$this->load->view('login', $data);
	}

	public function cover()
	{

		$q = $this->Minfo->info()->row();
		$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
		$data['jud_kat'] = !empty($q->nama) ? $q->nama : 'Kategori';
		$data['title'] = 'Selamat Datang Nasabah';
		$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
		$this->load->view('cover', $data);
	}

	public function daftar()
	{
		$q = $this->Minfo->info()->row();
		$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
		$data['jud_kat'] = !empty($q->nama) ? $q->nama : 'Kategori';
		$data['title'] = 'Selamat Datang Nasabah';
		$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
		$this->load->view('daftar', $data);
	}

	public function daftar2($id)
	{
		if ($this->Login_model->check_user2($id) == TRUE) {
			$data = array(
				'block' => '1',
			);
			$this->Login_model->palidasiemail($id, $data);
			$this->session->set_flashdata('pesanok', 'Silahkan Login Ulang');
			redirect('login');
		} else { ///falidasi
			$this->session->set_flashdata('pesan', 'Mohon Maaf, email tidak terdaftar, Silahkan Daftar kembali');
			redirect('login');
		}
	}
	function palidasi()
	{

		$q = $this->Minfo->info()->row();
		$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
		$data['title'] = 'Selamat Datang Nasabah';
		$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
		$data['sim'] = 'SIMPEG';
		$data['simlong'] = $q->namapt;
		$data['warna'] = '#254117';
		$data['warna2'] = '#BCE954';
		//$data['info']=$this->Minfo->info()->row();
		$this->load->view('login', $data);
	}

	function simpeg()
	{
		$this->index();
	}




	function prosesadmin()
	{ ///di pakai
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//////////////////////REV ILHAM
			if ($this->Login_model->check_user($username, $password) == TRUE) {
				$q = $this->Login_model->get_id_pass($username, $password);
				$q1 = $q->row();
				//$cek = $this->Munit->cek_unit($q1->id_unit);

				$newdata = array(
					'username' => $username,
					'password' => $password,
					'wewenang' => $q1->wewenang,
					'sub_wewenang' => $q1->sub_wewenang,
					'nama' => $q1->nama,
					// 'id_tgl' => $xxx.''.$xx.''.$x,
					'id_admin' => $q1->idlog,
					'id_user' => $q1->idlog,
					'id_k' => $q1->id_k,
					//     'master_login' => TRUE,
					'login' => TRUE
				);
				$this->session->set_userdata($newdata);


				if ($q1->idlog == 0 and $q1->username == $username and $q1->password == $password) {
					redirect('');
				} elseif ($q1->wewenang == 'admin') {
					redirect('C_admin/');
					// redirect('C_admin/rinci_pendapatan/0');
				} elseif ($q1->wewenang == 'allunit') {
					redirect('C_eksekutif/');
					// redirect('C_admin/rinci_pendapatan/0');
				} elseif ($q1->wewenang == 'unit') {
					redirect('C_biro/d_hariini');
					// redirect('C_admin/rinci_pendapatan/0');
				} elseif ($q1->wewenang == 'user' and $q1->block == '1') {
					redirect('Welcome/daftar');
					// redirect('C_admin/rinci_pendapatan/0');
				} else {
					$this->session->set_flashdata('pesan', 'Maaf, username atau password Anda salah a');
					redirect('login');
				}
			} else { ///cek model ueu_tbl_user
				$this->session->set_flashdata('pesan', 'Maaf, username atau password Anda Tidak terdaftar. .');
				redirect('login');
				//$this->proses0();
			}
		} else { ///falidasi
			$this->session->set_flashdata('pesan', 'Maaf, username atau password Anda salah');
			redirect('login');
		}
	} //f //ok admin

	function proses0()
	{


		$username = $this->input->post('username');
		$password = $this->input->post('password');



		if ($this->Login_model->check_user_id($username, $password) == TRUE) {
			$q = $this->Login_model->get_id_pass($username, $password);
			$q1 = $q->row();
			//$cek = $this->Munit->cek_unit($q1->id_unit);
			$newdata = array(
				'username' => $username,
				'password' => $password,
				//'wewenang' => $q1->wewenang, 
				'id_p' => $q1->id,
				'id_login' => TRUE
			);
			$this->session->set_userdata($newdata);


			if ($username and $password) {
				$this->session->set_flashdata("pesan", "<div class=\"col-xs-12-md-12\"><div class=\"alert alert-success\" id=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>Selamat Datang di Hotel Kusuma ,,,,Selamat  Menikmati</div></div>");
				redirect('C_sewa');
			}
			/*   elseif ($q1->wewenang == 'admin' AND $q1->password == 'akuntansi'){
                    redirect('akuntansi');
                } */ else {
				$this->session->set_flashdata('pesan', 'Maaf, username atau password Anda salah');
				redirect('login/sublogin');
			}
		} else { ///cek model tbl_pesan_kamar
			$this->session->set_flashdata('pesan', 'Maaf, username atau password Anda salah');
			redirect('login/sublogin');
			//$this->proses0();
		}
	}

	public function logout()
	{
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tanggal = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		$waktu = gmdate("H:i:s", time() + ($ms));

		//===========================================
		$this->session->set_userdata('login', FALSE);
		$this->session->set_userdata('master_login', FALSE);
		$this->session->set_userdata('id_login', FALSE);
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', 'Anda telah berhasil logout');
		redirect("login/");
	}
	////admin
	public function logoutadmin()
	{
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tanggal = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		$waktu = gmdate("H:i:s", time() + ($ms));

		$this->session->set_userdata('login', FALSE);
		$this->session->set_userdata('master_login', FALSE);
		$this->session->set_userdata('id_login', FALSE);
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', 'Anda telah berhasil logout');
		redirect("login/");
	}

	public function nolkan_data()
	{
		$this->Login_model->kosong_data();
		$this->session->set_flashdata('message', 'Data sudah di-nol-kan*');
		redirect('login');
	}

	public function base()
	{
		$this->session->set_userdata('login', FALSE);
		$this->session->sess_destroy();
		redirect("http://www.unmuhjember.ac.id");
	}

	function info()
	{
		if ($this->session->userdata('login1') == TRUE) {
			$q = $this->Minfo->info()->row();
			$data['q'] = $q;

			$data['namapt'] = !empty($q->namapt) ? $q->namapt : $this->config->item('nameAPP');
			$data['title'] = 'Selamat Datang Nasabah';
			$data['logo'] = !empty($q->logo) ? $q->logo : 'logo';
			$this->load->view('up_info', $data);
		} else {
			redirect('login/sublogin');
		}
	}
	function s_info()
	{
		$data = array(
			'namapt' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'tel' => $this->input->post('tel'),
			'namarektor' => $this->input->post('rektor'),
			'nip' => $this->input->post('nip'),
			'website' => $this->input->post('website'),
			'th_angg' => $this->input->post('thn'),
			'logo' => $this->input->post('logo'),
			'awal_angg' => $this->input->post('awal_a'),
			'akhir_angg' => $this->input->post('akhir_a'),

		);

		$this->Login_model->update_info($data);
		redirect('login/sublogin');
	}


	function daftar_simpan()
	{
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tanggal = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		$waktu = gmdate("H:i:s", time() + ($ms));


		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('user'),
			'password' => $this->input->post('pass'),
			'wewenang' => 'user',
			'block' => '0',
			'id_k' => 1,

			'unit' => $this->input->post('unit'),
			'jabatan' => $this->input->post('jabatan'),
			'no' => $this->input->post('no'),

			'tanggal' => $tanggal,
		);

		$this->Login_model->simpan_daftaraa($data); //simpan data le tbl user
		$gall = $this->Login_model->getalluser();

		foreach ($gall->result() as $all) {
			$id_akhir0 = $all->idlog;
		}
		$id_akhir = $id_akhir0;

		$isinot = '
		<p>Terimakasih sudah mendaftar .</p>
		<p>Username : ' . $this->input->post('user') . ' </p>
		<p>password : ' . $this->input->post('pass') . '</p>
		<p>Untuk Validasi Silahkan <a href="' . base_url('Login/daftar2/' . $id_akhir . '/#24121231dsa34asd3gj776usdaksaudag66ashdhasduyatsdasbjkka7a58asikgakajsgafaooiysda7sd5asdasdjasgdjasy') . '">Klik Disini</a></p>
		';

		$cekuser = $this->Login_model->check_user($this->input->post('user'), $this->input->post('pass'));
		$cekuser_sj = $this->Login_model->check_user_sj($this->input->post('user'));
		if ($cekuser == TRUE or $cekuser_sj == TRUE) {

			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-danger">
                    <h4>Mohon Maaf</h4>
                    <p>Email sudah terdaftar, silahkan buka email Anda untuk validasi</p>
                </div>'
			);
			redirect("Login/daftar");
		} else {
			///////////NOTIVIKASI EMAIL
			/**
			 * This example shows settings to use when sending via Google's Gmail servers.
			 */

			//SMTP needs accurate times, and the PHP time zone MUST be set
			//This should be done in your php.ini, but this is how to do it if you don't have access to that

			require_once(APPPATH . 'libraries/PHPMailerAutoload.php');
			$mail = new PHPMailer();
			$mail->SMTPDebug = 3;
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			//Ask for HTML-friendly debug output
			$mail->isHTML(true);
			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			// use
			// $mail->Host = gethostbyname('smtp.gmail.com');
			// if your network does not support SMTP over IPv6
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
			//Set the encryption system to use - ssl (deprecated) or tls
			// $mail->SMTPSecure = 'tls';
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = $this->config->item('mail');
			//Password to use for SMTP authentication
			$mail->Password = $this->config->item('pass_mail');
			//Set who the message is to be sent from
			$mail->setFrom($this->config->item('mail'), 'ADMIN');
			//Set an alternative reply-to address
			//Set who the message is to be sent to
			$mail->addAddress($this->input->post('user'), $this->input->post('nama'));
			//Set the subject line
			$mail->Subject = 'Notifikasi Pendaftaran.';
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

			//Replace the plain text body with one created manually
			$mail->Body    = $isinot;
			$mail->AltBody = '';
			//Attach an image file
			$mail->addAttachment('');
			//send the message, check for errors
			if (substr($this->input->post('user'), -10) != '9090393') {
				if ($mail->send()) {
					$this->session->set_flashdata(
						'msg',
						'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                    <p>Pendaftaran Berhasil</p>
                    <p>Silahkan Klik Palidasi Yang ada di email anda.</p>
                </div>'
					);
					redirect("Login/daftar"); //palidasi
					//}


				} else { //GAGAL kirim
					$this->session->set_flashdata(
						'msg',
						'<div class="alert alert-danger">
                    <h4>Gagal</h4>
                    <p>Email Tidak kekirim</p> ' . $mail->ErrorInfo . '
                </div>'
					);
					redirect("Login/daftar");
				}
			} else { //bukan umyacid 
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-danger">
                    <h4>Gagal</h4>
                    <p>Email Tidak Sesuai</p>
                </div>'
				);
				redirect("Login/daftar");
			}
		}
	}

	function daftar_simpan_useraset($id_k)
	{
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tanggal = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		$waktu = gmdate("H:i:s", time() + ($ms));


		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('user'),
			'password' => $this->input->post('pass'),
			'wewenang' => 'user',
			'block' => '1',
			'id_k' => $id_k,

			'unit' => $this->input->post('unit'),
			'jabatan' => $this->input->post('jabatan'),
			'no' => $this->input->post('no'),

			'tanggal' => $tanggal,
		);

		$this->Login_model->simpan_daftaraa($data); //simpan data le tbl user
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                </div>'
		);
		redirect('C_biro/daftar_khusus_aset');
	}

	function simpan_up_useraset($id, $bl = NULL)
	{
		$h = "7"; // Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$tanggal = gmdate("d-m-Y ", time() + ($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		$waktu = gmdate("H:i:s", time() + ($ms));

		if ($bl == 'bl') {
			$data = array(
				'block' => 0,
			);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('user'),
				'password' => $this->input->post('pass'),
				//'wewenang'=>'user',
				'block' => 1,
				//'id_k'=>$id_k,

				'unit' => $this->input->post('unit'),
				'jabatan' => $this->input->post('jabatan'),
				'no' => $this->input->post('no'),

				//'tanggal'=>$tanggal,
			);
		}



		$this->Login_model->update_status($data, $id); //simpan data le tbl user
		$this->session->set_flashdata(
			'msg',
			'<div class="alert alert-success">
                    <h4>Berhasil</h4>
                </div>'
		);
		redirect('C_biro/daftar_khusus_aset');
	}
} ///calss