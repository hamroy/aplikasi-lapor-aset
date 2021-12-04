 
 
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
    for($x=1;$x <=5; $x++){
    	
    	
		?>
	<tr>
		<th><?=$x?></th>
		<th><?=$d[$x]?></th>
		<th><?=$num[$x]?></th>
	</tr>
		
		<?php
	}
    ?>
    
	
	
</table>
                        
                   </div>     
                       
                        
                </div>