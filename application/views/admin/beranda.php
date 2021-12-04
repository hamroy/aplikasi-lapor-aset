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
		  }
          ?>
        
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php
         if($this->session->userdata('login')==TRUE){ ?>
         	<li style="padding: 20px; color: #13ec34">Selamat Datang <?=$this->session->userdata('username')?> ,</li>
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
                   
  
  <a href="<?=base_url('Welcome/profil')?>" class="list-group-item " >
   Profil
  </a>
   <a href="<?=base_url('Welcome/ganti_pass')?>" class="list-group-item " >
   Ganti Pasword
  </a>
  <a href="<?=base_url('C_admin/')?>" class="list-group-item ">
    Tambah Kategori / Unit
  </a>
   <a href="<?=base_url('C_admin/daftar_unit')?>" class="list-group-item ">
    Daftar  Kategori / Unit
  </a>
  <span class="list-group-item"><form data-aos="zoom-in-down">
                        <input class="form-control pa" type="text" placeholder="Ketik disini ..." autocomplete="off">
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