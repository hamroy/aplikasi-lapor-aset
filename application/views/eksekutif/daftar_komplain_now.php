 
 
  <div class="col-lg-12 col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
                    <div class="ilham12">
                        <div class="well"><span class="judul">Daftar Aduan </span></div>
                        
                        
                        
                    </div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
	<tr>
		<th>No.</th>
		<th>Kategori</th>
		<th>Aduan hari ini</th>
		<th>Belum ditanggapi</th>
		<th>On progres</th>
		<th>Selesai</th>
		<th>Total</th>
	</tr>
	<?php
	$g=$this->M_eksekutif->get_all_kategori(); //get sattus no 1
	
	if($g->num_rows() > 0){
		$no=1;
		$aa1=0;
		$aa2=0;
		$aa3=0;
		$aa4=0;
		$aa5=0;
	foreach($g->result() as $key){
		///////NOW
	$now=$this->M_eksekutif->get_seluhanunit_now_all($key->id); //get sattus no 1
		if($now->num_rows() > 0){
			$now1=$now->num_rows();
			$a1='<a href="'.base_url('C_eksekutif/rinci_kategori/1/'.$key->id).'">'.$now1.'</a>';
		}else{
			$a1='';
			$now1=0;
		}
		///////BLEM DI PROSS
	$now2=$this->M_eksekutif->get_seluhanunit_blm_dibaca_all($key->id); //get sattus no 2
		if($now2->num_rows() > 0){
			$now22=$now2->num_rows();
			$a2='<a href="'.base_url('C_eksekutif/rinci_kategori/2/'.$key->id).'">'.$now22.'</a>';
		}else{
			$a2='';
			$now22=0;
		}
		///////SEDANG DI PROSS
	$now3=$this->M_eksekutif->get_seluhanunit_proses_all($key->id); //get sattus no 3
		if($now3->num_rows() > 0){
			$now33=$now3->num_rows();
			$a3='<a href="'.base_url('C_eksekutif/rinci_kategori/3/'.$key->id).'">'.$now33.'</a>';
		}else{
			$a3='';
			$now33=0;
		}
		///////SELESAI
	$now4=$this->M_eksekutif->get_seluhanunit_finis_all($key->id); //get sattus no 4
		if($now4->num_rows() > 0){
			$now44=$now4->num_rows();
			$a4='<a href="'.base_url('C_eksekutif/rinci_kategori/4/'.$key->id).'">'.$now44.'</a>';
		}else{
			$a4='';
			$now44=0;
		}
		$stot=$now22+$now33+$now44;
		if($stot > 0){
			$a5='<a href="'.base_url('C_eksekutif/rinci_kategori_subtot/'.$key->id).'">'.$stot.'</a>';
		}else{
			$a5='';
		}
		
	?>	
	<tr>
		<td><?=$no++?></td>
		<td><b><?=$key->nama?></b></td>
		<td align="center"><?=$a1?></td>
		<td align="center"><?=$a2?></td>
		<td align="center"><?=$a3?></td>
		<td align="center"><?=$a4?></td>
		<td align="center"><?=$a5?></td>
	</tr>
	<?php	
	$aa1=$aa1+$now1;
	$aa2=$aa2+$now22;
	$aa3=$aa3+$now33;
	$aa4=$aa4+$now44;
	$aa5=$aa5+$stot;
	
	} ///for
	if($aa1 > 0){
			$aaa1='<a href="'.base_url('C_eksekutif/rinci_kategori_all/1/').'">'.$aa1.'</a>';
		}else{
			$aaa1='';
		}
	if($aa2 > 0){
			$aaa2='<a href="'.base_url('C_eksekutif/rinci_kategori_all/2/').'">'.$aa2.'</a>';
		}else{
			$aaa2='';
		}
	if($aa3 > 0){
			$aaa3='<a href="'.base_url('C_eksekutif/rinci_kategori_all/3/').'">'.$aa3.'</a>';
		}else{
			$aaa3='';
		}
	if($aa4 > 0){
			$aaa4='<a href="'.base_url('C_eksekutif/rinci_kategori_all/4/').'">'.$aa4.'</a>';
		}else{
			$aaa4='';
		}
	if($aa5 > 0){
			$aaa5='<a href="'.base_url('C_eksekutif/rinci_kategori_all/5/').'">'.$aa5.'</a>';
		}else{
			$aaa5='';
		}
	?>
	<tr>
		<td colspan="1" align="center"><b></b></td>
		<td colspan="1" align="center"><b>Total</b></td>
		<td align="center"><?=$aaa1?></td>
		<td align="center"><?=$aaa2?></td>
		<td align="center"><?=$aaa3?></td>
		<td align="center"><?=$aaa4?></td>
		<td align="center"><?=$aaa5.''?></td>
	</tr>
	
	<?php
	
	}
	
	?>
	
</table>
                        
                   </div>     
                       
                        
                </div>