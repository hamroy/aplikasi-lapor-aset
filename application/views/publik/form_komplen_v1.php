  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
<!-- <p data-bs-hover-animate="bounce"> <a href="<?=base_url('welcome/')?>" class="btn" style="background: #e2e225">Kembali</a></p>-->
  
                   <div class="ilham12">
    <div class="well"><span class="judul"> <a href="<?=base_url('welcome/daftar')?>">Daftar Aduan</a> || Tambah Aduan</span></div>
    <form method="post" action="<?=base_url('Welcome/simpan_complin/'.$id_k)?>" enctype="multipart/form-data">
        <div class="form-group">
            <ul class="list-group">
               <!-- <li class="list-group-item"><span class="ilham lab">NAMA </span>
                    <input type="text" name="nama" placeholder="nama lengkap" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" required />
                    <small class="text-info">Nama wajib diisi.</small>
                </li>
                <li class="list-group-item"><span class="ilham lab">JABATAN </span>
                    <input type="text" name="jabatan" placeholder="jabatan" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                <li class="list-group-item"><span class="ilham lab">No. HP</span>
                    <input type="text" name="no" required placeholder="no.hp / telpon" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info">No. HP wajib diisi.</small>
                </li>
                <li class="list-group-item"><span class="ilham lab">EMAIL </span>
                    <input type="text" name="email" required placeholder="email " class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info">Email wajib diisi.</small>
                </li>-->
                 <li class="list-group-item"><span class="ilham lab">UNIT</span>
                    <br/><br/>
                     <select class="form-control" name="id_k">
                    <?php
                     if($this->session->userdata('id_k')==1){
					   //	$gelalllkat=$this->Mpublik->get_all_kategori();
					   	$gelalllkat=$this->Mpublik->get_all_kategori_perid();
					   }else{
					   	$gelalllkat=$this->Mpublik->get_all_kategori_no1();
					   	
					   }
                        
                        foreach($gelalllkat->result() as $a){ 
                     
                        ?>
  						<option value="<?=$a->id?>"><b><?=$a->nama?></b></option>
  						
					 <?php	
					 
						}
                        ?>
</select>
                </li>
                 <li class="list-group-item"><span class="ilham lab">URUSAN</span>
                    <br/><br/>
                     <select class="form-control" name="id_k">
                    <?php
                     if($this->session->userdata('id_k')==1){
					   //	$gelalllkat=$this->Mpublik->get_all_kategori();
					   	$gelalllkat=$this->Mpublik->get_all_kategori_perid();
					   }else{
					   	$gelalllkat=$this->Mpublik->get_all_kategori_no1();
					   	
					   }
                        
                        foreach($gelalllkat->result() as $a){ 
                     
                        ?>
  						<option value="<?=$a->id?>"><b><?=$a->nama?></b></option>
  						
					 <?php	
					 
						}
                        ?>
</select>
                </li>
				<li class="list-group-item"><span class="ilham lab">JENIS PEKERJAAN</span>
                    <br/><br/>
                     <select class="form-control" name="id_k">
                    <?php
                     if($this->session->userdata('id_k')==1){
					   //	$gelalllkat=$this->Mpublik->get_all_kategori();
					   	$gelalllkat=$this->Mpublik->get_all_kategori_perid();
					   }else{
					   	$gelalllkat=$this->Mpublik->get_all_kategori_no1();
					   	
					   }
                        
                        foreach($gelalllkat->result() as $a){ 
                     
                        ?>
  						<option value="<?=$a->id?>"><b><?=$a->nama?></b></option>
  						
					 <?php	
					 
						}
                        ?>
</select>
                </li>
                 <li class="list-group-item"><span class="ilham lab">JUDUL ADUAN </span>
                    <input type="text" name="judul" required placeholder="judul Aduan " class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info">judul Aduan wajib diisi. (mak 100)</small>
                </li>
                <li class="list-group-item ilham"><span class="ilham lab">ADUAN </span>
                    <textarea rows="12" cols="2" name="com" placeholder="complain" class="form-control ilhamare" required></textarea>
                    <small class="text-info">Aduan wajib diisi.</small>
                </li>
                <li class="list-group-item ilham"><span class="ilham lab">FILE PENDUKUNG </span>
                    <input type="file" name="file"  class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info"></small>
                </li>
                <li class="list-group-item">
                
                <?php
                $get_cekstatus=$this->Mpublik->get_seluhanid_status_Selesai();
                if($get_cekstatus->num_rows() > 0){
					?>
					
					<button  type="button" class="btn btn-default btn-block" data-toggle="tooltip" data-placement="top" title="PASTIAKN BERI RANTING TERLEBIH DAHULU SEBELUM BUAT ADUAN BARU"><strong>KIRIM</strong></button>

					<?php
				}else{
					?>
					<button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>KIRIM</strong> </button>
					<?php
				}
                ?>
                    
                </li>
            </ul>
        </div>
    </form>
</div>

<p> <a href="<?=base_url('welcome/')?>" class="btn" style="background: #e2e225">Kembali</a></p>
                </div>