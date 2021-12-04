 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                    <div class="ilham12">
                    <?php
                    $getkeluhan=$this->Mpublik->get_perkeluhan($id_k);
                    ?>
                        <div class="well"><span class="judul">Daftar User Khusus Aset</span></div>
                        
                        
                        
                    </div>
                    <button class="btn btn-primary" style="background: #1f32e0" data-toggle="modal" data-target="#myModala">
 BUAT BARU
</button>

<br/><br/>

<!-- Modal -->
<div class="modal" id="myModala" tabindex="-12" role="" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">BUAT BARU</h4>
        
      </div>
      <div class="modal-body">
         <form method="post" action="<?=base_url('login/daftar_simpan_useraset/'.$id_k)?>">
        <div class="form-group">
            <ul class="list-group">
                <li class="list-group-item"><span class="ilham lab">NAMA </span>
                    <input type="text" name="nama" placeholder="NAMA" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                <li class="list-group-item"><span class="ilham lab">USERNAME </span>
                    <input type="text" name="user" placeholder="USERNAME" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-danger">Email harus menggunakan @umy.ac.id</small>
                </li>
                <li class="list-group-item"><span class="ilham lab">PASSWORD</span>
                    <input type="password" name="pass" placeholder="PASSWORD" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                <br/>
                 <li class="list-group-item"><span class="ilham lab">Unit Kerja </span>
                    <input type="text" name="unit" placeholder="Unit Kerja" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                 <li class="list-group-item"><span class="ilham lab">JABATAN </span>
                    <input type="text" name="jabatan" placeholder="jabatan" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                 <li class="list-group-item"><span class="ilham lab">No. HP</span>
                    <input type="text" name="no" required placeholder="no.hp / telpon" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info">No. HP wajib diisi.</small>
                </li>
                
                <li class="list-group-item">
                    <button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>SIMPAN</strong> </button>
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
		
		<th>Nama</th>
		<th>Username</th>
		<th>password</th>
		<th>No. Hp</th>
		<th>Unit Kerja</th>
		<th>Jabatan</th>
		<th>Status</th>
		<th>Menu</th>
		
	</tr>
	<?php
	$g=$this->Munit->get_user_aset($id_k); //get sattus no 1
	if($g->num_rows() > 0){
		$no=1;
	foreach($g->result() as $key){
	?>	
	<tr>
		<td><?=$no++?></td>
		<td><?=$key->nama?></td>
		<td><?=$key->username?></td>
		<td><?=$key->password?></td>
		<td><?=$key->no?></td>
		<td><?=$key->unit?></td>
		<td><?=$key->jabatan?></td>
		<td><?php
		switch($key->block){
			case 0:
			echo 'NON AKTIF';
			
			break;
			case 1:
			echo 'AKTIF';	
			break;
			
			case '':
			break;
		}
		
		
		?></td>
		<td>
		<!---->
		
		<!-- Button trigger modal -->
<button class="btn btn-primary" style="background: #37cc33" data-toggle="modal" data-target="#myModal<?=$key->idlog?>">
 EDIT
</button>
<br/><br/>
<a href="<?=base_url('login/simpan_up_useraset/'.$key->idlog.'/bl')?>" onclick="return confirm('anda yakin??')" class="btn btn-xs" style="background: #ff0000">Diblock </a>


<!-- Modal -->
<div class="modal" id="myModal<?=$key->idlog?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">EDIT</h4>
      </div>
      <div class="modal-body">
         <form method="post" action="<?=base_url('login/simpan_up_useraset/'.$key->idlog)?>">
        <div class="form-group">
            <ul class="list-group">
                <li class="list-group-item"><span class="ilham lab">NAMA </span>
                    <input type="text" name="nama" value="<?=$key->nama?>" placeholder="NAMA" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                <li class="list-group-item"><span class="ilham lab">USERNAME </span>
                    <input type="text" name="user" value="<?=$key->username?>" placeholder="USERNAME" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-danger">Email harus menggunakan @umy.ac.id</small>
                </li>
                <li class="list-group-item"><span class="ilham lab">PASSWORD</span>
                    <input type="text" name="pass"  value="<?=$key->password?>" placeholder="PASSWORD" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                <br/>
                 <li class="list-group-item"><span class="ilham lab">Unit Kerja </span>
                    <input type="text" name="unit"   value="<?=$key->unit?>"placeholder="Unit Kerja" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                 <li class="list-group-item"><span class="ilham lab">JABATAN </span>
                    <input type="text" name="jabatan"  value="<?=$key->jabatan?>" placeholder="jabatan" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                 <li class="list-group-item"><span class="ilham lab">No. HP</span>
                    <input type="text" name="no"  value="<?=$key->no?>" required placeholder="no.hp / telpon" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info">No. HP wajib diisi.</small>
                </li>
                
                <li class="list-group-item">
                    <button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>SIMPAN</strong> </button>
                     <button class="btn btn-default btn-block btn-lg ilham" style="background-color: #ff0000" class="close" data-dismiss="modal"><span aria-hidden="true">Batal</button>
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