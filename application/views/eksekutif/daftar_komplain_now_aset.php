 
 
  <div class="col-lg-12 col-md-12 col-md-offset-0 col-sm-12 col-xs-12">
                    <div class="ilham12">
                        <div class="well"><span class="judul">Daftar Aduan BIRO ASET</span></div>
                        
                        
                        
                    </div>
                   <div class="table-responsive">
                  
                   <table class="table table-striped">
    <?php
    $d=array(
    '1'=>'Aduan hari ini',
    '2'=>'Belum ditanggapi',
    '3'=>'On progres',
    '4'=>'Selesai',
    '5'=>'Total',
    );
  	
  	  	///////NOW
	$now=$this->M_eksekutif->get_seluhanunit_now_all(1); //get sattus no 1
		if($now->num_rows() > 0){
			$now1=$now->num_rows();
			$a1='<a href="'.base_url('C_eksekutif/rinci_kategori/1/1').'">'.$now1.'</a>';
		}else{
			$a1='';
			$now1=0;
		}
		///////BLEM DI PROSS
	$now2=$this->M_eksekutif->get_seluhanunit_blm_dibaca_all(1); //get sattus no 2
		if($now2->num_rows() > 0){
			$now22=$now2->num_rows();
			$a2='<a href="'.base_url('C_eksekutif/rinci_kategori/2/1').'">'.$now22.'</a>';
		}else{
			$a2='';
			$now22=0;
		}
		///////SEDANG DI PROSS
	$now3=$this->M_eksekutif->get_seluhanunit_proses_all(1); //get sattus no 3
		if($now3->num_rows() > 0){
			$now33=$now3->num_rows();
			$a3='<a href="'.base_url('C_eksekutif/rinci_kategori/3/1').'">'.$now33.'</a>';
		}else{
			$a3='';
			$now33=0;
		}
		///////SELESAI
	$now4=$this->M_eksekutif->get_seluhanunit_finis_all(1); //get sattus no 4
		if($now4->num_rows() > 0){
			$now44=$now4->num_rows();
			$a4='<a href="'.base_url('C_eksekutif/rinci_kategori/4/1').'">'.$now44.'</a>';
		}else{
			$a4='';
			$now44=0;
		}
		///TOTL	
		$stot=$now22+$now33+$now44;
		if($stot > 0){
			$a5='<a href="'.base_url('C_eksekutif/rinci_kategori_subtot/1').'">'.$stot.'</a>';
		}else{
			$a5='';
		}
    $num=array(
    '1'=>$a1,
    '2'=>$a2,
    '3'=>$a3,
    '4'=>$a4,
    '5'=>$a5,
    );
    
    ?>
    
    <tr>
		<th></th>
		<th>Sekarang</th>
		<th>Belum Direspon</th>
		<th>Progress</th>
		<th>Selesai</th>
		<th>Total</th>
	</tr>
	
	<?php
	$get_sub_kel=$this->M_eksekutif->get_all_sub_kel($id_k); //get sub keluhan
	if($get_sub_kel->num_rows() > 0){
		$aa1=0;
		$aa2=0;
		$aa3=0;
		$aa4=0;
		$aa5=0;
	foreach($get_sub_kel->result() as $sl){
		?>
	<tr>
		<td width="30%"><?=$sl->nama_sub?></td>
	
		<td colspan="6"></td>
	</tr>
	<?php
	$get_sub_uru=$this->M_eksekutif->get_all_kategori_sub_exs($sl->id); //get sub keluhan
	if($get_sub_uru->num_rows() > 0){
	
	foreach($get_sub_uru->result() as $sur){
		///////NOW
	$now=$this->M_eksekutif->get_seluhanunit_now_all_sub($sur->id_k,$sur->id); //get sattus no 1
		if($now->num_rows() > 0){
			$now1=$now->num_rows();
			$a1='<a href="'.base_url('C_eksekutif/rinci_kategori/1/1').'">'.$now1.'</a>';
		}else{
			$a1='';
			$now1=0;
		}
	///////BLEM DI PROSS
	$now2=$this->M_eksekutif->get_seluhanunit_blm_dibaca_all_sub($sur->id_k,$sur->id); //get sattus no 2
		if($now2->num_rows() > 0){
			$now22=$now2->num_rows();
			$a2='<a href="'.base_url('C_eksekutif/rinci_kategori/2/1').'">'.$now22.'</a>';
		}else{
			$a2='';
			$now22=0;
		}
		///////SEDANG DI PROSS
	$now3=$this->M_eksekutif->get_seluhanunit_proses_all_sub($sur->id_k,$sur->id); //get sattus no 3
		if($now3->num_rows() > 0){
			$now33=$now3->num_rows();
			$a3='<a href="'.base_url('C_eksekutif/rinci_kategori/3/1').'">'.$now33.'</a>';
		}else{
			$a3='';
			$now33=0;
		}
		///////SELESAI
	$now4=$this->M_eksekutif->get_seluhanunit_finis_all_sub($sur->id_k,$sur->id); //get sattus no 4
		if($now4->num_rows() > 0){
			$now44=$now4->num_rows();
			$a4='<a href="'.base_url('C_eksekutif/rinci_kategori/4/1').'">'.$now44.'</a>';
		}else{
			$a4='';
			$now44=0;
		}
		///TOTL	
		$stot=$now22+$now33+$now44;
		if($stot > 0){
			$a5='<a href="'.base_url('C_eksekutif/rinci_kategori_subtot/1').'">'.$stot.'</a>';
		}else{
			$a5='';
		}
	?>
	<tr>
		<td width="30%"> (+) <?=$sur->nama_jenis?></td>
	
		<td><?=$a1?></td>
		<td><?=$a2?></td>
		<td><?=$a3?></td>
		<td><?=$a4?></td>
		<td><?=$a5?></td>
	</tr>
	
	<?php	
	$aa1=$aa1+$now1;
	$aa2=$aa2+$now22;
	$aa3=$aa3+$now33;
	$aa4=$aa4+$now44;
	$aa5=$aa5+$stot;
	
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
	
		} //sub urusan
		
		}
	?>
	
		
		<?php
	}	 //sub keluhan
	
	
	}
	?>
	<tr>
		<td colspan="1" align="center"><b>Total</b></td>
		<td align="center"><?=$aaa1?></td>
		<td align="center"><?=$aaa2?></td>
		<td align="center"><?=$aaa3?></td>
		<td align="center"><?=$aaa4?></td>
		<td align="center"><?=$aaa5.''?></td>
	</tr>
	
</table>
                        
                   </div>     
                       
                        
                </div>