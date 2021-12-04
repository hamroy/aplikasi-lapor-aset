 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                    <div class="ilham12">
                        <div class="well"><span class="judul">Daftar Aduan '<?=$cari?>'</span></div>
                        
                        
                        
                    </div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
		<th>No.</th>
		<th>No. Tiket</th>
		<th>Judul Aduan</th>
		<th>Status</th>
		<th>tanggal tanggapan</th>
		<th>Menu</th>
	</tr>
	<?php
	$g=$get;
	//echo $get;
	if($geta=='kosong'){
		
	}else{
	if($g->num_rows() > 0){
		$no=1;
	foreach($g->result() as $key){
		
		if($key->status==1){
		$this->Munit->rubahstatus($key->id); //up sattus no 1ke 2	
		}
		
	?>	
	<tr>
		<td><?=$no++?></td>
		<td><?=$key->id_tiket?></td>
		<td><a href="<?=base_url('C_biro/rinci_keluhan/'.$key->id)?>"><?=$key->judul?></a></td>
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
		
		$gg=$this->Munit->get_tanggapan_keluhan_idlast($key->id); //get sattus no 1
		if($gg->num_rows()>0){
		echo $gg->row()->tgl_kom;	
		}else{
			echo '';
		}
		
		?></td>
		<td>
		<a class="btn btn-primary" style="background: #37cc33" href="<?=base_url()?>C_biro/rinci_keluhan/<?=$key->id?>">
 Lihat Rinci
</a>
		<!--<a href="<?=base_url('C_biro/proses_buat_tiket/'.$key->id)?>" class="btn btn-xs" style="background: #37cc33">Tanggapi</a>-->
		
		<!-- Button trigger modal -->
		<?php
		if($key->status<=2){ ?>
			
			<!--<button class="btn btn-primary" style="background: #37cc33" data-toggle="modal" data-target="#myModal">
 Tanggapi
</button>-->
		
		<?php
		}
		
		?>


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
	}
	
	
	?>
	
</table>
                        
                   </div>     
                       
                        
                </div>