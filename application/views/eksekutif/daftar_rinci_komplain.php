 <div class="col-lg-9 col-md-9 col-md-offset-2 col-sm-9 col-xs-12">
 	<div class="ilham12">
 		<div class="well">
 			<!--<a href=""><span class="judul">Daftar Laporan Belum Direspon</span></a> --><span class="judul"><a href="<?= base_url() ?>C_eksekutif/">Daftar Aduan</a> || Rinci Aduan</span>
 		</div>



 	</div>

 	<div class="row">
 		<div class="col-xs-12 col-sm-12 col-md-12">
 			<?php
				$g = $this->Munit->get_seluhanunit_blm_dibaca_perid($id_com); //get sattus no 1
				if ($g->num_rows() > 0) {
					$judul = $g->row()->judul;
					$keluhan = $g->row()->complain;
					//
					$tiket = $g->row()->id_tiket;
					$nama = $g->row()->nama;
					$tgl = $g->row()->tgl;
					$id_k = $g->row()->id_k;
					$id_k_sub = $g->row()->id_k_sub;
					$status = $g->row()->status;
					$foto = $g->row()->file;

					//
					$getkeluhan = $this->Mpublik->get_perkeluhan($id_k);
					$kat = $getkeluhan->row()->nama;
					$getkeluhan_sub = $this->Munit->get_all_kategori_sub($id_k_sub);
					if ($getkeluhan_sub->num_rows() > 0) {
						$sub = $getkeluhan_sub->row()->nama_sub;
					} else {
						$sub = '';
					}
					//

				}
				?>
 			<h4><b><?= $judul ?></b></h4>
 			<h5><b>Aduan : </b></h5>
 			<read>
 				<?= $keluhan ?>
 			</read>
 			<?php
				if (!empty($foto)) {
				?>
 				<h6><b>File Pendukung : </b></h6>
 				<a href="<?= base_url() ?>/upload/<?= $foto ?>" target="_blank"><?= $foto ?></a>
 			<?php
				}
				?>
 			<hr />


 			<!--input-->


 			<?php
				$gg = $this->Munit->get_tanggapan_keluhan($id_com); //get sattus no 1
				if ($gg->num_rows() > 0) {

					foreach ($gg->result() as $key) {
						$getnamauser = $this->Mpublik->get_getnamauser($key->id_user)->row()->nama;
						$getditblcom = $this->Mpublik->get_getidcom($id_com)->row();

						if ($this->session->userdata('id_user') == $key->id_user) {
							$warna = 'style="background: #a9e3fc"';
						} else {
							$warna = 'style="background: #dfe3e1"';
						}
				?>





 					<ul class="list-group" style="margin-bottom: 1px">
 						<li class="list-group-item" <?= $warna ?>>
 							<span class="ilham lab"><img src="../../images/logo.png" style="height: 35px; margin-right: 10px" alt="" /> <?= $getnamauser ?> </span>

 							<p style="margin-top: 0px"><?= $key->tanggapan ?></p>

 							<small class="text-muted"><?= $key->tgl_kom ?></small>
 							<?php
								if (!empty($key->file)) {
								?>
 								<h6><b>File Pendukung : </b></h6>
 								<a href="<?= base_url() ?>/upload/<?= $key->file ?>" target="_blank"><?= $key->file ?></a>
 							<?php
								}

								?>


 						</li>
 					</ul>

 			<?php
					} //foreach

				}

				?>











 		</div>
 	</div>
 	<a href="<?= base_url() ?>C_eksekutif/">
 		<- Kembali</a>



 </div>