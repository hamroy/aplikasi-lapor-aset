<?php

$jml=$this->Mpublik->get_tc2($_POST[nama_prov]);
if($jml->num_rows() > 0){
    
    echo"
     <option selected>- Pilih Kota -</option>";
     foreach($jml->result() as $a){ 
                     
                        ?>
  						<option value="<?=$a->kota_id?>"><b><?=$a->kota_nama?></b></option>
  						
					 <?php	
					 
						}
     
}else{
    echo "
     <option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
?>  