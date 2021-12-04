 <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
     <div class="ilham12">
         <div class="well">
             <!--<a href=""><span class="judul">Daftar Laporan Belum Direspon</span></a> --><span class="judul"> Rinci Aduan</span>
         </div>



     </div>

     <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-8">
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
                    $p_jawab = $g->row()->p_jawab;

                    //
                    $getkeluhan = $this->Mpublik->get_perkeluhan($id_k);
                    $kat = $getkeluhan->row()->nama;

                    $getkeluhan_sub = $this->Munit->get_all_kategori_sub($id_k_sub);
                    if ($getkeluhan_sub->num_rows() > 0) {
                        $sub = $getkeluhan_sub->row()->nama_sub;
                        $sub_jenis = $getkeluhan_sub->row()->nama_jenis;
                    } else {
                        $sub = '';
                        $sub_jenis = '';
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
             <?php
                if ($status != 4) {
                ?>
                 <button class="btn btn-primary" style="background: #37cc33" data-toggle="modal" data-target="#myModal">
                     Tanggapi
                 </button>
                 <a class="btn btn-primary" href="<?= base_url('C_biro/proses_selesai/' . $id_com) ?>">
                     Selesai
                 </a>

                 <!-- <button class="btn btn-primary" style="background: #dfdf20 ; color: #000000" data-toggle="modal" data-target="#myModaldiposisi">
 Disposisi
</button> -->



             <?php
                }
                ?>


             <!--MODAL-->
             <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <h4 class="modal-title" id="myModalLabel">TANGGAPAN</h4>
                 </div>
                 <div class="modal-body">
                     <form method="post" role="form" action="<?= base_url('C_biro/proses_buat_tiket/' . $id_com) ?>" enctype="multipart/form-data">
                         <li class="list-group-item" style="background: #cdcfeb">

                             <div class="form-group">
                                 <ul class="list-group">


                                     <textarea rows=4" cols="2" name="com" placeholder="TANGGAPAN" class="form-control ilhamare" required></textarea>


                                     <div class="form-group">
                                         <label for="exampleInputEmail1">PROGRES</label>
                                         <select class="form-control" name="pr">
                                             <?php
                                                $get_progres = $this->Minfo->get_progres_keluhanall();
                                                foreach ($get_progres->result() as $pro) {
                                                ?>

                                                 <option value="<?= $pro->kode ?>"><?= $pro->ket ?></option>

                                             <?php
                                                }

                                                ?>

                                         </select>
                                     </div>
                                     <?php
                                        if (!empty($p_jawab)) {
                                            echo '<input type="hidden" value="" name="' . $p_jawab . '" />';
                                        } else {
                                        ?>

                                         <div class="form-group">
                                             <label for="exampleInputEmail1">PENANGGUNG JAWAB</label>

                                             <textarea rows=1" cols="1" name="p_jawab" placeholder="PENANGGUNG JAWAB" class="form-control ilhamare" required>

</textarea>

                                             <!--<select class="form-control" name="subkat">
    <?php
                                            $get_subkat = $this->Minfo->get_get_subkat($id_k);
                                            foreach ($get_subkat->result() as $pro) {
    ?>
		
		<option value="<?= $pro->id ?>" ><?= $pro->nama_sub ?></option>		
		
		<?php
                                            }

        ?>
  
</select>-->
                                         </div>

                                     <?php
                                        }

                                        ?>


                                     <input type="file" name="file" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />

                                 </ul>
                             </div>



                         <li class="list-group-item">
                             <button class="btn btn-default btn-block btn-lg ilham" type="submit"><strong>KIRIM</strong> </button>
                         </li>



                         </li>
                     </form>
                 </div>

             </div>

             <!--MODAL-->
             <div class="modal" id="myModaldiposisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <h4 class="modal-title" id="myModalLabel">DISPOSISI</h4>
                 </div>
                 <div class="modal-body">
                     <form method="post" action="<?= base_url('C_biro/proses_disposisi/' . $id_com) ?>">
                         <li class="list-group-item" style="background: #cdcfeb">

                             <div class="form-group">
                                 <ul class="list-group">
                                     <label class="label-control" for="">
                                         <h5>Tujuan</h5>
                                     </label>
                                     <select class="form-control" name="t7">
                                         <?php
                                            $gelalllkat = $this->Mpublik->get_all_kategori();
                                            foreach ($gelalllkat->result() as $a) {
                                                if ($a->id == $this->session->userdata('id_k')) {
                                                    continue;
                                                }
                                            ?>
                                             <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                                         <?php
                                            }
                                            ?>
                                     </select>


                                 </ul>
                             </div>


                         <li class="list-group-item">
                             <button class="btn btn-default btn-block btn-lg ilham" type="submit"><strong>Pindah</strong> </button>
                         </li>



                         </li>
                     </form>
                 </div>

             </div>
             <hr />





             <?php
                $gg = $this->Munit->get_tanggapan_keluhan($id_com); //get sattus no 1
                if ($gg->num_rows() > 0) {

                    foreach ($gg->result() as $key) {
                        $getnamauser = $this->Mpublik->get_getnamauser($key->id_user)->row()->nama;

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








             <!--input-->




         </div>
         <div class="col-xs-12 col-md-4">
             <ul class="list-group">
                 <li class="list-group-item">
                     <span class="ilham lab">No. Tiket </span>

                     <p style="margin-top: 0px"><?= $tiket ?></p>
                     <hr style="margin-top: 0px" />

                     <span class="ilham lab">Nama</span>
                     <p style="margin-top: 0px"><?= $nama ?></p>
                     <hr style="margin-top: 0px" />

                     <span class="ilham lab">Tanggal</span>
                     <p style="margin-top: 0px"><?= $tgl ?></p>
                     <hr style="margin-top: 0px" />

                     <span class="ilham lab">Unit Kerja</span>
                     <p style="margin-top: 0px"><?= $kat ?></p>
                     <hr style="margin-top: 0px" />

                     <span class="ilham lab">Urusan</span>
                     <p style="margin-top: 0px"><?= $sub ?></p>
                     <hr style="margin-top: 0px" />
                     <span class="ilham lab">Jenis Pekerjaan</span>
                     <p style="margin-top: 0px"><?= $sub_jenis ?></p>
                     <hr style="margin-top: 0px" />
                     <span class="ilham lab">Penanggung Jawab</span>
                     <p style="margin-top: 0px"><?= $p_jawab ?></p>
                     <hr style="margin-top: 0px" />

                     <span class="ilham lab">Status</span>
                     <p style="margin-top: 0px"><?php
                                                switch ($status) {
                                                    case '4':
                                                        echo 'Selesai';
                                                        break;
                                                    case '3':
                                                        echo 'Proses';
                                                        break;
                                                    case '2':
                                                        echo 'Belum Direspon';
                                                        break;
                                                    case '1':
                                                        echo 'Belum Direspon';
                                                        break;
                                                    case '0':
                                                        echo 'Belum Direspon';
                                                        break;
                                                }

                                                ?></p>
                     <hr style="margin-top: 0px" />

                 </li>
             </ul>

         </div>
     </div>




 </div>

 <?php

    echo $getidall = $this->Mpublik->get_seluhanall_max();
