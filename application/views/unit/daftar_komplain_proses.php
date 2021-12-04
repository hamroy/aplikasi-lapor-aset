 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                    <div class="ilham12">
                        <div class="well"><span class="judul">Daftar Aduan On Prosses</span></div>
                        
                        
                        
                    </div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
		<th>No.</th>
		<th>No. Tiket</th>
		<th>Pelapor </th>
		<th>Unit Kerja </th>
		<th>Judul Aduan</th>
		<th>Urusan</th>
		<th>Jenis</th>
		<th>Tanggal</th>
		<th>tanggal tanggapan</th>
		<th>Progres</th>
	</tr>
	<?php
	$g=$this->Munit->get_seluhanunit_proses(); //get sattus no 3
	if($g->num_rows() > 0){
		$no=1;
	foreach($g->result() as $key){
	?>	
	<tr>
		<td><?=$no++?></td>
		<td><?=$key->id_tiket?></td>
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
		<td><?php
		
		$gg=$this->Munit->get_tanggapan_keluhan_idlast($key->id); //get sattus no 1
		if($gg->num_rows()>0){
		echo $gg->row()->tgl_kom;	
		}else{
			echo '';
		}
		
		?></td>
		<td><?php
		
		$get_progres=$this->Minfo->get_progres_keluhan_perid($gg->row()->progres); //get sattus no 1
		if($get_progres->num_rows()>0){
		echo $get_progres->row()->ket;	
		}else{
			echo '';
		}
		
		?></td>
	</tr>
	<?php	
	}
	}
	
	?>
	
</table>
                        
                   </div>     
                       
                        
                </div>