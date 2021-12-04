 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                    <div class="ilham12">
                    <?php
                    $getkeluhan=$this->Mpublik->get_perkeluhan($id_k);
                    $g=$this->Munit->get_all_kategori_sub_urusan($id_uru); //get sattus no 1
                    if($g->num_rows() > 0){
						$s_uru=$g->row()->nama_sub;
					}else{
						$s_uru='';
					}
					
                    ?>
                        <div class="well"><span class="judul">Daftar Unit Kerja <?=$g->row()->nama?></span></div>
                        
                    </div>
                    <div class="well" style="height: 50px; padding-right: 1px; padding-top: 1px;padding-bottom: 1px"><span class="judul"> <a href="<?=base_url('C_biro/sub_kategori')?>">Unit Kerja</a> || Urusan <?=$s_uru?></span></div>
                    <button class="btn btn-primary" style="background: #1f32e0" data-toggle="modal" data-target="#myModala">
 BUAT BARU
</button>

<br/><br/>

<!-- Modal -->
<div class="modal" id="myModala" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">BUAT BARU</h4>
        
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('C_biro/proses_buat_Sub_urusan/'.$id_uru)?>">
        <div class="form-group">
            <ul class="list-group">
                
              
                <li class="list-group-item ilham"><span class="ilham lab">Jenis Pekerjaan </span>
                    <input type="text" name="sub"  class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                
                <li class="list-group-item">
                    <button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>Simpan</strong> </button>
                </li>
            </ul>
        </div>
    </form>
      </div>
      
      
</div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
		<th>No.</th>
		<th>Jenis Pekerjaan</th>
		<th>Menu</th>
	</tr>
	<?php
	
	if($g->num_rows() > 0){
		$no=1;
	foreach($g->result() as $key){
	?>	
	<tr>
		<td><?=$no++?></td>
		<td><?=$key->nama_jenis?></td>
		<td>
		<!---->

		<!-- Button trigger modal -->
<button class="btn btn-primary" style="background: #37cc33" data-toggle="modal" data-target="#myModal<?=$key->id?>">
 EDIT
</button>
<a href="<?=base_url('C_biro/proses_hapus_sub_urusan/'.$key->id.'/'.$id_uru)?>" onclick="return confirm('anda yakin??')" class="btn btn-xs" style="background: #ff0000">Hapus</a>


<!-- Modal -->
<div class="modal" id="myModal<?=$key->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('C_biro/proses_buat_edit_Sub_urusan/'.$key->id.'/'.$id_uru)?>">
        <div class="form-group">
            <ul class="list-group">
                
              
                <li class="list-group-item ilham"><span class="ilham lab">Jenis Pekerjaan  </span>
                    <input type="text" name="sub" value="<?=$key->nama_jenis?>"   class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                
                <li class="list-group-item">
                    <button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>Simpan</strong> </button>
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