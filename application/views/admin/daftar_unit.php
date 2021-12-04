 
 
  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
	
		<td colspan="3" >
		<h4>DAFTAR KATEGORI / UNIT</h4>
		 </td>
	</tr>
	
	<tr>
		<td>NAMA KATEGORI / UNIT</td>
		<td>USERNAME</td>
		<td>PASSWORD</td>
	</tr>
	<?php
	$q=$this->M_eksekutif->get_all_kategori();
	foreach($q->result() as $x){
		$z=$this->M_eksekutif->get_user_perid_k($x->id)->row();
		?>
		<tr>
		<td><?=$x->nama?></td>
		<td><?=$z->username?></td>
		<td><?=$z->password?></td>
	</tr>
		
		<?php
	}
	?>
	
	
</table>
                        
                   </div>     
                       
                        
                </div>