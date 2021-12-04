 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                    <div class="ilham12">
                        <div class="well"><span class="judul">Daftar Aduan Belum Direspon</span></div>
                        
                        
                        
                    </div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
		<th>No.</th>
		<th>Pelapor</th>
		<th>Unit Kerja</th>
		<th>Judul Aduan</th>
		<th>Urusan</th>
		<th>Jenis</th>
		<th>Tanggal</th>
		<th>Menu</th>
	</tr>
	<?php
	$g=$this->Munit->get_seluhanunit_blm_dibaca(); //get sattus no 1
	if($g->num_rows() > 0){
		$no=1;
	foreach($g->result() as $key){
		$this->Munit->rubahstatus($key->id); //up sattus no 1ke 2	
	?>	
	<tr>
		<td><?=$no++?></td>
		<td>
		
		<a href="#" data-toggle="modal" data-target="#myModalprofil<?=$key->id?>">
 <?=$key->nama?>
</a>	
			<!-- Modal -->
<div class="modal" id="myModalprofil<?=$key->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">PROFIL <?=$key->nama?></h4>
      </div>
      <div class="modal-body">
       <table>
       <?php
       $get_unit=$this->Munit->get_user_id($key->id_user)->row();
       ?>
	<tr>
		<td>NAMA</td>
		<td>: <?=$get_unit->nama?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: <?=$get_unit->username?></td>
	</tr>
	<tr>
		<td>No Hp</td>
		<td>: <?=$get_unit->no?></td>
	</tr>
	<tr>
		<td>Unit Kerja</td>
		<td>: <?=$get_unit->unit?></td>
	</tr>
	<tr>
		<td>Jabatan</td>
		<td>: <?=$get_unit->jabatan?></td>
	</tr>
</table>
      </div>
      
</div>
			
		</td>
		<td><?=$key->unit?></td>
		<td><a href="<?=base_url('C_biro/rinci_keluhan/'.$key->id)?>"><?=$key->judul?></a></td>
		<td>
		
		<?php
		$getkeluhan_sub=$this->Munit->get_all_kategori_sub($key->id_k_sub);
		if($getkeluhan_sub->num_rows() >0){
		ECHO $getkeluhan_sub->row()->nama_sub;	
		}
		?>	
			
		</td>
		<td>
		
		<?php
		$getkeluhan_sub=$this->Munit->get_all_kategori_sub($key->id_k_sub);
		if($getkeluhan_sub->num_rows() >0){
		ECHO $getkeluhan_sub->row()->nama_jenis;	
		}
		?>	
			
		</td>
		<td><?=$key->tgl?></td>
		<td>
		<!--<a href="<?=base_url('C_biro/proses_buat_tiket/'.$key->id)?>" class="btn btn-xs" style="background: #37cc33">Tanggapi</a>-->
		
		<!-- Button trigger modal -->
<!--<button class="btn btn-primary" style="background: #37cc33" data-toggle="modal" data-target="#myModal">
 Tanggapi
</button>-->
<a class="btn btn-primary" style="background: #37cc33" href="<?=base_url()?>C_biro/rinci_keluhan/<?=$key->id?>">
 Lihat Rinci
</a>


<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">TANGGAPAN</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('C_biro/proses_buat_tiket/'.$key->id)?>">
        <div class="form-group">
            <ul class="list-group">
                
                <li class="list-group-item ilham"><span class="ilham lab">TANGGAPAN </span>
                    <textarea rows=4" cols="2" name="com" placeholder="TANGGAPAN" class="form-control ilhamare" required></textarea>
                    <small class="text-info">TANGGAPAN wajib diisi.</small>
                </li>
                <li class="list-group-item ilham"><span class="ilham lab">FILE PENDUKUNG </span>
                    <input type="file" name="file"  class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                <li class="list-group-item ilham"><span class="ilham lab">STATUS </span>
  <div class="checkbox">
    <input type="checkbox" value="">
    SELESAI
</div>
                </li>
                <li class="list-group-item">
                    <button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>KIRIM</strong> </button>
                </li>
            </ul>
        </div>
    </form>
      </div>
      
</div>
		</td>
		
	</tr>
	<?php	
	}
	}
	
	?>
	
</table>
                        
                   </div>     
                       
                        
                </div>