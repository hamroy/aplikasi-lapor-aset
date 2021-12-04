 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                    <div class="ilham12">
                        <div class="well"><span class="judul">Daftar Aduan Finish</span></div>
                        
                        
                        
                    </div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
		<th>No.</th>
		<th>No. Tiket</th>
		<th>Pelapor</th>
		<th>Unit Kerja</th>
		<th>Judul Aduan</th>
		<th>Urusan</th>
		<th>Jenis</th>
		<th>Tanggal</th>
		<th>tanggal tanggapan</th>
		<th width="13%">Ranting Kepuasan</th>
	</tr>
	<?php
	$g=$this->Munit->get_seluhanunit_finis(); //get sattus no 4
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
			echo $key->tgl;
		}
		
		?></td>
		<td><?php
		if($key->status == 4){ ?>
		
		<style>
.li{display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.highlight, .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
</style>
		<style>
.li2{display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.highlight2, .selected2 {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
</style>
		
		 <?php
        if($key->star > 0){
        	
        for($x=1;$x<=5;$x++)	{
			
		if($x <= $key->star){
			?>
      <li id="star" class="li2 highlight2 selected2"  >&#9733;</li>
      
        
        <?php
		}else{
			?>
      <li id="star" class="li2"  >&#9733;</li>
      
        
        <?php
		}
        	 
		}
		}
        
        ?>
		
		
		
		<?php
	
		
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