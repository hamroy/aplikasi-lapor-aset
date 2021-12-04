 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                   
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
	
		<td colspan="2" >PROFIL
		 <?php
		 if($edit==NULL){ 
		 ?>
		 
		 <span class="pull-right"><a href="<?=base_url('Welcome/profil/ya')?>" class="btn"><p>edit</p></a></span> 
		 <?php } ?>
		 </td>
	</tr>
	<?php
	$get=$this->Login_model->getalluser_perid();
	
	?>
	<?php
	if($edit=='ya'){ 
		?>
		<form method="post" action="<?=base_url('Welcome/simpan_edit_profil/')?>" enctype="multipart/form-data">
		<tr>
		<td >NAMA : <input type="text" value="<?=$get->row()->nama?>" name="nama" /></td>
	</tr>
	
	<tr>
		<td >Unit Kerja : <input type="text" value="<?=$get->row()->unit?>" name="unit" /></td>
	</tr>
	<tr>
		<td >Jabatan :<input type="text" value="<?=$get->row()->jabatan?>" name="jabatan" /></td>
	</tr>
	<tr>
		<td >No. HP : <input type="text" value="<?=$get->row()->no?>" name="no" /></td>
	</tr>
	<tr>
		<td ><button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>SIMPAN</strong> </button></td>
	</tr>
	
	</form>	
		<?php
	}else{
		?>
		<tr>
		<td width="20%">NAMA</td>
		<td ><?=$get->row()->nama?></td>
	</tr>
	<tr>
		<td width="20%">Email</td>
		<td ><?=$get->row()->username?></td>
	</tr>
	<tr>
		<td width="20%">Unit Kerja</td>
		<td ><?=$get->row()->unit?></td>
	</tr>
	<tr>
		<td width="20%">Jabatan</td>
		<td ><?=$get->row()->jabatan?></td>
	</tr>
	<tr>
		<td width="20%">No. HP</td>
		<td ><?=$get->row()->no?></td>
	</tr>
		
		<?php
	}
	?>
	
	
	
</table>
                        
                   </div>     
                       
                        
                </div>