 
 
  <div class="col-lg-12 col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
                    <div class="ilham12">
                    <?php
		
	
		?>	
                        <div class="well"><span class="judul"><a href="<?=base_url('C_eksekutif/')?>">Daftar Aduan </a> || Semua Kategori - <?=$bt?></span></div>
                        
                        
                        
                    </div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Unit Kerja</th>
		
		<th>No. Hp</th>
		<th>Email</th>
		
		<th>Judul</th>
		<th>UNIT</th>
		<th>Urusan</th>
		<th>Jenis</th>
		<th>Tanggal Lapor</th>
		<th>Tanggal Tanggapan</th>
		<th>Status</th>
		<th>Progres</th>
		<th width="20%">Ranting Kepuasan</th>
		
		
		
		
	</tr>
	<?php
	$g=$now1; //get sattus no 1
	
	if($g->num_rows() > 0){
		$no=1;
	foreach($g->result() as $key){
		
	?>	
	<tr>
		<td><?=$no++?></td>
		<td><b><?=$key->nama?></b></td>
		<td><?=$key->unit?></td>
		<td><?=$key->no?></td>
		<td><?=$key->email?></td>
		<td>
			<?php
				echo'<a href="'.base_url('C_eksekutif/rinci_keluhan_user/'.$key->id).'">'.$key->judul.'</a>';
			
			?>
			
		</td>
		
		<td><?php
		$getkeluhan=$this->Mpublik->get_perkeluhan($key->id_k);
		echo $getkeluhan->row()->nama;
		?></td>
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
				case'5':
				echo'Disposisi';
				break;
				case'4':
				echo'Selesai';
				break;
				case'3':
				echo'Proses';
				break;
				case'2':
				echo'Belum Direspon';
				break;
				case'1':
				echo'Belum Direspon';
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
		}elseif($key->status == 4){
			echo 'SELESAI';
		}
		
		else{
			echo 'BELUM DIRESPON';
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
		echo ''	;	
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