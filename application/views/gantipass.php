 
 
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
	<form method="post" action="<?=base_url('Welcome/simpan_ganti_pass/')?>" enctype="multipart/form-data">
		<tr>
		<td >USERNAME : <input type="text" value="<?=$get->row()->username?>" name="user" /></td>
	</tr>
	
	<tr>
		<td >PASSWORD : <input type="text" value="<?=$get->row()->password?>" name="pass" /></td>
	</tr>
	
	<tr>
		<td ><button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>SIMPAN</strong> </button></td>
	</tr>
	
	</form>	
	
	
	
</table>
                        
                   </div>     
                       
                        
                </div>