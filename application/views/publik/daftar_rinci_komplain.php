 <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
   <div class="ilham12">
     <div class="well">
       <!--<a href=""><span class="judul">Daftar Laporan Belum Direspon</span></a> --><span class="judul"><a href="<?= base_url() ?>Welcome/daftar">Daftar Aduan</a> || Rinci Aduan</span>
     </div>



   </div>

   <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
       <?php
        $g = $this->Munit->get_seluhanunit_blm_dibaca_perid($id_com); //get sattus no 1
        if ($g->num_rows() > 0) {
          $judul = $g->row()->judul;
          $keluhan = $g->row()->complain;
          $star = $g->row()->star;
          //
          $tiket = $g->row()->id_tiket;
          $nama = $g->row()->nama;
          $tgl = $g->row()->tgl;
          $id_k = $g->row()->id_k;
          $status = $g->row()->status;
          $foto = $g->row()->file;

          //
          $getkeluhan = $this->Mpublik->get_perkeluhan($id_k);
          $kat = $getkeluhan->row()->nama;
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
        if ($status > 2) {
        ?>
         <div>
           <style>
             .li {
               display: inline-block;
               color: #F0F0F0;
               text-shadow: 0 0 1px #666666;
               font-size: 30px;
             }

             .highlight,
             .selected {
               color: #F4B30A;
               text-shadow: 0 0 1px #F48F0A;
             }
           </style>
           <style>
             .li2 {
               display: inline-block;
               color: #F0F0F0;
               text-shadow: 0 0 1px #666666;
               font-size: 30px;
             }

             .highlight2,
             .selected2 {
               color: #F4B30A;
               text-shadow: 0 0 1px #F48F0A;
             }
           </style>

           <div class="panel">
             <?php
              if ($status == 4) {
              ?>
               <form class="form-inline" method="post" action="<?= base_url('Welcome/save_ranting/' . $id_com) ?>">
                 <div class="form-group">
                   <?php
                    if ($star == 0) {
                      $vs = '';
                    } else {
                      $vs = $star;
                    }

                    ?>
                   <input type="hidden" value="<?= $vs ?>" name="rating" id="rating" />
                   <ul onmouseout="resetRating();">
                     <li id="star" class="li" title="Sangat Tidak Puas" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                     <li id="star" class="li" title="Tidak Puas" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                     <li id="star" class="li" title="Cukup Puas" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                     <li id="star" class="li" title="Puas" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                     <li id="star" class="li" title="Sangat Puas" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>

                   </ul>
                 </div>
                 <div class="form-group">
                   <button class="btn btn-default lg ilham" type="submit"><strong>Simpan</strong> </button>
                 </div>



               </form>


             <?php

              } else { ?>

               <div class="form-group">
                 <button class="btn btn-primary" style="background: #37cc33" data-toggle="modal" data-target="#myModal">
                   Tanggapi
                 </button>
               </div>
             <?php  }
              ?>




           </div>



         </div>


       <?php
        } else {
        ?>
         <button class="btn btn-primary" style="background: #37cc33" data-toggle="modal" data-target="#myModaledit">
           EDIT
         </button>
         <button class="btn btn-primary" style="background: #3c47b3" data-toggle="modal" data-target="#myModaleditfoto">
           Edit File Pendukung
         </button>
       <?php
        }

        ?>


       <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
           <h4 class="modal-title" id="myModalLabel">TANGGAPAN</h4>
         </div>
         <div class="modal-body">
           <form method="post" action="<?= base_url('C_biro/proses_buat_tiket/' . $id_com . '/publik') ?>" enctype="multipart/form-data">
             <li class="list-group-item" style="background: #cdcfeb">

               <div class="form-group">
                 <ul class="list-group">

                   <textarea rows=4" cols="2" name="com" placeholder="TANGGAPAN" class="form-control ilhamare" required></textarea>
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
       <div class="modal" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
           <h4 class="modal-title" id="myModalLabel">EDIT KELUHAN</h4>
         </div>
         <div class="modal-body">
           <form method="post" action="<?= base_url('Welcome/edit_complin/' . $id_com) ?>" enctype="multipart/form-data">
             <li class="list-group-item" style="background: #cdcfeb">

               <div class="form-group">
                 <ul class="list-group">
                   <li class="list-group-item">
                     <label class="label-control" for="">JUDUL</label>
                     <input type="text" value="<?= $judul ?>" name="judul" />
                   </li>
                   <textarea rows=4" cols="2" name="com" placeholder="Aduan" class="form-control ilhamare" required><?= $keluhan ?></textarea>


                 </ul>
               </div>


             <li class="list-group-item">
               <button class="btn btn-default btn-block btn-lg ilham" type="submit"><strong>KIRIM</strong> </button>
             </li>



             </li>
           </form>
         </div>

       </div>
       <div class="modal" id="myModaleditfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
           <h4 class="modal-title" id="myModalLabel">Edit File Pendukung</h4>
         </div>
         <div class="modal-body">
           <form method="post" action="<?= base_url('Welcome/edit_complin_foto/' . $id_com) ?>" enctype="multipart/form-data">
             <li class="list-group-item" style="background: #cdcfeb">

               <div class="form-group">
                 <ul class="list-group">
                   <li class="list-group-item">
                     <?php
                      if (!empty($foto)) {
                      ?>
                       <h6><b>File Pendukung : </b></h6>
                       <a href="<?= base_url() ?>/upload/<?= $foto ?>" target="_blank"><?= $foto ?></a>
                     <?php
                      }
                      ?>
                   </li>
                   <input type="file" name="file" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />


                 </ul>
               </div>


             <li class="list-group-item">
               <button class="btn btn-default btn-block btn-lg ilham" type="submit"><strong>Simpan</strong> </button>
             </li>



             </li>
           </form>
         </div>

       </div>
       <hr />

       <!--input-->


       <?php
        if ($ra != 'ra') {


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
        } ///ra
        ?>











     </div>
   </div>




 </div>