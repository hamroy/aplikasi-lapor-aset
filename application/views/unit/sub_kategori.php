 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                    <div class="ilham12">
                    <?php
                    $getkeluhan=$this->Mpublik->get_perkeluhan($id_k);
                    ?>
                        <div class="well"><span class="judul">Daftar Unit Kerja <?=$getkeluhan->row()->nama?></span></div>
                        
                        
                        
                    </div>
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
        <form method="post" action="<?=base_url('C_biro/proses_buat_Sub_kategori/'.$id_k)?>">
        <div class="form-group">
            <ul class="list-group">
                
              
                <li class="list-group-item ilham"><span class="ilham lab">Nama Sub Kategori </span>
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
		<th>Urusan</th>
		<th>Menu</th>
	</tr>
	<?php
	$g=$this->Munit->get_sub_kluhan_idk($id_k); //get sattus no 1
	if($g->num_rows() > 0){
		$no=1;
	foreach($g->result() as $key){
	?>	
	<tr>
		<td><?=$no++?></td>
		<td><?=$key->nama_sub?></td>
		<td>
		<!---->
<a href="<?=base_url('C_biro/sub_urusan/'.$key->id)?>" class="btn btn-xs" style="background: #1520ea">Rinci</a>
		
		<!-- Button trigger modal -->
<button class="btn btn-primary" style="background: #37cc33" data-toggle="modal" data-target="#myModal<?=$key->id?>">
 EDIT
</button>
<a href="<?=base_url('C_biro/proses_hapus_subkategori/'.$key->id)?>" onclick="return confirm('anda yakin??')" class="btn btn-xs" style="background: #ff0000">Hapus</a>


<!-- Modal -->
<div class="modal" id="myModal<?=$key->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url('C_biro/proses_buat_edit_Sub_kategori/'.$key->id)?>">
        <div class="form-group">
            <ul class="list-group">
                
              
                <li class="list-group-item ilham"><span class="ilham lab">Nama Sub Kategori </span>
                    <input type="text" name="sub" value="<?=$key->nama_sub?>"   class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
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