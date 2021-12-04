 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                   
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
	
		<td colspan="2" >GANTI PASSWORD
		
		 </td>
	</tr>
	<?php
	$get=$this->Login_model->getalluser_perid();
	
	?>
	<form method="post" action="<?=base_url('C_admin/simpan_pluss_kat/')?>" enctype="multipart/form-data">
		<tr>
		<td >NAMA KATEGORI : <input type="text" value="" placeholder="nama kategori" name="kat" /></td>
	</tr>
	
	<tr>
		<td >USERNAME : <input type="text" value="" placeholder="Username" name="user" /></td>
		
	</tr>
	<tr>
		<td >PASSWORD : <input type="text" value="" placeholder="Password" name="pass" /></td>
		
	</tr>
	
	
	<tr>
		<td ><button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>SIMPAN</strong> </button></td>
	</tr>
	
	</form>	
	
	
	
</table>
                        
                   </div>     
                       
                        
                </div>