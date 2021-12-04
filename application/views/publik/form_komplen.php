  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
<!-- <p data-bs-hover-animate="bounce"> <a href="<?=base_url('welcome/')?>" class="btn" style="background: #e2e225">Kembali</a></p>-->
  
                   <div class="ilham12">
    <div class="well"><span class="judul"> <a href="<?=base_url('welcome/daftar')?>">Daftar Aduan</a> || Tambah Aduan</span></div>
    <form method="post" action="<?=base_url('Welcome/simpan_complin/'.$id_k)?>" enctype="multipart/form-data">
        <div class="form-group">
            <ul class="list-group">
              
                 <li class="list-group-item"><span class="ilham lab">URUSAN</span>
                    <br/><br/>
                     <select class="form-control" name="id_k" onchange="loadPage(this.form.elements[0])"  style="border-radius: 6px ; width: 100%;">
                    <?php
                     if($this->session->userdata('id_k')==1){
					   //	$gelalllkat=$this->Mpublik->get_all_kategori();
					   	$gelalllkat=$this->Mpublik->get_all_kategori_perid();
					   }else{
					   	$gelalllkat=$this->Mpublik->get_all_kategori_no1();
					   	
					   }
                        
                        foreach($gelalllkat->result() as $a){ 
                     
                        ?>
  						<!--<option value="<?=$a->id?>"><b><?=$a->nama?></b></option>-->
  						<option value="#" disabled><b><?=$a->nama?></b></option>
  						<option  value="#" >-- PILIH URUSAN</option>
  						<?php
                     $gelalllkat_uru=$this->Munit->get_sub_kluhan_idk($a->id);
                        
                        
                        
                        foreach($gelalllkat_uru->result() as $auru){ 
                     	
                     	if($uru == $auru->id){
						$s='selected';
						}else{
						$s='';
						}
                     	
                        ?>
                         
  						<option value="<?=base_url('Welcome/form_kategori/'.$a->id.'/'.$auru->id)?>" <?=$s?> > -- <b><?=$auru->nama_sub?></b></option>
  						
					 <?php	
					 
						}
                        ?>
  						
					 <?php	
					 
						}
                        ?>
</select>
                </li>
                
				<li class="list-group-item"><span class="ilham lab">JENIS PEKERJAAN</span>
                    <br/><br/>
                     <select class="form-control" name="jenis">
                    <?php
                     $gelalllkat_jns=$this->Mpublik->get_lis_keluhan_jenis($uru);
                        
                        foreach($gelalllkat_jns->result() as $a){ 
                     
                        ?>
  						<option value="<?=$a->id?>"><b><?=$a->nama_jenis?></b></option>
  						
					 <?php	
					 
						}
                        ?>
</select>
                </li>
                 <li class="list-group-item"><span class="ilham lab">JUDUL ADUAN </span>
                    <input type="text" name="judul" required placeholder="judul Aduan " class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info">judul Aduan wajib diisi. (mak 100)</small>
                </li>
                <li class="list-group-item ilham"><span class="ilham lab">ADUAN </span>
                    <textarea rows="12" cols="2" name="com" placeholder="complain" class="form-control ilhamare" required></textarea>
                    <small class="text-info">Aduan wajib diisi.</small>
                </li>
                <li class="list-group-item ilham"><span class="ilham lab">FILE PENDUKUNG </span>
                    <input type="file" name="file"  class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info"></small>
                </li>
                <li class="list-group-item">
                
              <button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>KIRIM</strong> </button>
                    
                </li>
            </ul>
        </div>
    </form>
</div>

<p> <a href="<?=base_url('welcome/')?>" class="btn" style="background: #e2e225">Kembali</a></p>
                </div>
                
                
                
                
<!--select-->
                <script>

function loadPage(list) {

   document.location.href=list.options[list.selectedIndex].value;
	
}

        //Ketika elemen class sembunyi di klik maka elemen class gambar sembunyi
       
</script>

<?php
//echo $uru;
//echo $id_k=$this->Munit->get_all_kategori_sub(5)->row()->id_k; //get sattus no 1
?>