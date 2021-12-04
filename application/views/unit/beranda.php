<!DOCTYPE html>
<html>

<?php
            ///view isi
            $this->load->view('head');
            ///view isi
            
            ?>

<body>
   
 <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation" style="background: #1b4a0f">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h4 style="color: #ffffff"><b><?=$namapt?></b></h4>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <?php
          if($this->session->userdata('wewenang')=='unit' or $this->session->userdata('wewenang')=='allunit'){
		  	?>
		  	
		  	
		  	<?php
		  }else{
		  	?>
		  	 <li class=""><a href="<?=base_url('Welcome/daftar')?>">Daftar Aduan</a></li>
         <li class=""><a href="<?=base_url('Welcome/')?>">Tambah Aduan</a></li>
         <li class=""><a href="<?=base_url('Welcome/profil')?>">Profil</a></li>
			<?php		  	
		  }
          ?>
        
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php
         if($this->session->userdata('login')==TRUE){ ?>
         	<li style="padding: 20px; color: #13ec34">Selamat Datang <?=$this->session->userdata('nama')?> ,</li>
            <li><a href="<?=base_url('Login/logout')?>" onclick="return confirm('Anda Yakin akan KELUAR !')">KELUAR</a></li>
         <?php	}else{ ?>
			<li><a href="<?=base_url('Login/logout')?>">DAFTAR</a></li>
            <li><a href="<?=base_url('Login')?>">MASUK</a></li>	
		<?php	}
          ?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!--<div class="bawahbg">
        <div class="jumbotron ilham" data-bs-hover-animate="bounce">
            <h2 class="hidden-xs">Selamat Datang di <strong><?=$namapt?></strong></h2>
            <h5 class="visible-xs">Selamat Datang di <strong><?=$namapt?></strong></h5>
        </div>
    </div>-->
    <div>
        <div class="container">
            <div class="row ilham">
           
           <div class="col-lg-3 col-lg-offset-12 col-md-3 col-md-offset-12 col-sm-3 col-sm-offset-12 col-xs-12 col-xs-offset-12 ilham" style="margin:-1px;">
                   <div class="list-group">
<a class="list-group-item" href="<?=base_url('Welcome/profil')?>">Profil</a>


<?php
if($this->session->userdata('sub_wewenang')=='admin'){ 
if($this->session->userdata('id_k')==1){ ?>


  <a href="<?=base_url('C_biro/daftar_khusus_aset')?>" class="list-group-item <?=$f?>">
    Daftar User Khusus Aset
  </a>
  
  <?php
  }
  ?>
  <a href="<?=base_url('C_biro/sub_kategori')?>" class="list-group-item <?=$e?>">
    Daftar Urusan
  </a>
  <?php
  
  } 
  
  ?>
  <a href="<?=base_url('C_biro/d_hariini')?>" class="list-group-item <?=$b?>">
    Daftar Aduan hari ini
  </a>
  
  <a href="<?=base_url('C_biro')?>" class="list-group-item <?=$a?>" >
    Daftar Aduan Belum Direspon
  </a>
  <a href="<?=base_url('C_biro/proses')?>" class="list-group-item <?=$c?>">Daftar Aduan On Progress</a>
  <a href="<?=base_url('C_biro/finis')?>" class="list-group-item <?=$d?>">Daftar Aduan Finish</a>
  <span class="list-group-item"><form data-aos="zoom-in-down" method="post" action="<?=base_url('C_biro/cari_rinci')?>"> 
                        <input class="form-control pa" type="text" name="cari" placeholder="Ketik No. Tiket / Judul Aduan" autocomplete="on">
                        <button class="btn btn-primary btn-block" type="submit" style="width:100%;"><strong>CARI ADUAN</strong> </button>
                    </form></span>
</div>
                </div>
           
            <?php
            ///view isi
            $this->load->view($view);
            ///view isi
            
            ?>
            
                
            </div>
        </div>
        <div id="notifications" ><?php echo $this->session->flashdata('msg'); ?></div> 
    </div>
    <footer class="footerilahm">
    <p class="text-center"><?=date('Y')?> &copy;  <?=$namapt?></p>
</footer>
			<?php
            ///view isi
            $this->load->view('js');
            ///view isi
            
            ?>

</body>

</html>