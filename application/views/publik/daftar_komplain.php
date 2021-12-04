
  <div class="col-lg-12 col-md-12 col-md-offset-0 col-sm-12 col-xs-12 u">
                    <div class="ilham12">
                        <div class="well"><span class="judul">DAFTAR ADUAN </span></div>
                        
                        
                        
                    </div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
		<th>No.</th>
		<th>No. Tiket</th>
		<th>Unit Kerja</th>
		<th>Urusan</th>
		<th>Jenis Pekerjaan</th>
		<th>Judul Aduan</th>
		<th>Tanggal</th>
		<th>Tanggal tanggapan </th>
		<th>Status</th>
		<th>Progres</th>
		<th width="20px">Tingkat Kepuasan</th>
	</tr>
	<?php
	
	$g=$this->Mpublik->get_seluhanid();
	if($g->num_rows() > 0){
		$no=1;
	foreach($g->result() as $key){
	?>	
	<tr>
		<td><?=$no++?></td>
		<td><?=$key->id_tiket?></td>
		<td>
		
		<?php
		$getkeluhan=$this->Mpublik->get_perkeluhan($key->id_k);
		echo $getkeluhan->row()->nama;
		?>	
			
		</td>
		<td>
		
		<?php
		$getkeluhan_sub=$this->Munit->get_all_kategori_sub($key->id_k_sub);
		if($getkeluhan_sub->num_rows() >0){
		echo $getkeluhan_sub->row()->nama_sub;	
		}
		
		?>	
			
		</td>
		<td>
		
		<?php
		$getkeluhan_sub=$this->Munit->get_all_kategori_sub($key->id_k_sub);
		if($getkeluhan_sub->num_rows() >0){
		echo $getkeluhan_sub->row()->nama_jenis;	
		}
		
		?>	
			
		</td>
		<td><a href="<?=base_url('Welcome/rinci_keluhan_user/'.$key->id)?>"><?=$key->judul?></a></td>
		<td><?=$key->tgl?></td>
		<td><?php
		
		$gg=$this->Munit->get_tanggapan_keluhan_idlast($key->id); //get sattus no 1
		if($gg->num_rows()>0){
		echo $gg->row()->tgl_kom;	
		}else{
			echo '';
		}
		
		?></td>
		<td>
			<?php
			switch($key->status){
				case'4':
				echo'<a href="'.base_url('Welcome/rinci_keluhan_user/'.$key->id).'">Selesai</a>';
				break;
				case'3':
				echo'<a href="'.base_url('Welcome/rinci_keluhan_user/'.$key->id).'">Proses</a>';
				break;
				case'2':
				echo'Dilihat';
				break;
				case'1':
				echo'Terkirim';
				break;
				case '0':
				echo 'Tidak ada respon';
				break;
			}
			
			?>
			
		</td>
		<td><?php
		if($key->status > 2 and $key->status != 4){
		$get_progres=$this->Minfo->get_progres_keluhan_perid($gg->row()->progres); //get sattus no 1
		if($get_progres->num_rows()>0){
		echo $get_progres->row()->ket;	
		}
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
		}else{
		echo '<a href="'.base_url('Welcome/rinci_keluhan_user/'.$key->id.'/ra').'">Beri Penilaian</a>'	;	
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
                <!--STAR RANTING-->       
			
	