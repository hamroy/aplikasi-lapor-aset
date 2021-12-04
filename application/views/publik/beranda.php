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
          if($this->session->userdata('wewenang')=='unit'){
		  	?>
		  	
		  	
		  	<?php
		  }else{
		  	?>
		  	 <li class=""><a href="<?=base_url('Welcome/daftar')?>">Daftar Aduan</a></li>
		  	   <?php
                $get_cekstatus=$this->Mpublik->get_seluhanid_status_Selesai();
                if($get_cekstatus->num_rows() > 0){
					?>
					
					<li class=""><a href="#"  onclick="return confirm('BERI PENILAIAN TERLEBIH DAHULU')">Tambah Aduan</a></li>

					<?php
				}else{
					?>
					 <li class=""><a href="<?=base_url('Welcome/')?>">Tambah Aduan</a></li>
					<?php
				}
                ?>
        
         <li class=""><a href="<?=base_url('Welcome/profil')?>">Profil</a></li>
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
        </div>
        <!--nav-collapse -->
      </div>
    </div>

   <!-- <div class="bawahbg">
        <div class="jumbotron ilham" data-bs-hover-animate="bounce">
            <h2 class="hidden-xs">Selamat Datang di <strong><?=$namapt?></strong></h2>
            <h5 class="visible-xs">Selamat Datang di <strong><?=$namapt?></strong></h5>
        </div>
    </div>-->
    <div>
        <div class="container">
            <div class="row ilham">
            
            
            
            
            
            <?php
            ///view isi
            $this->load->view($view);
            ///view isi
            
            ?>
              <?php
          if($this->session->userdata('wewenang')!='unit'){
		  	?>
		  	<!--<div class="col-lg-3 col-lg-offset-12 col-md-3 col-md-offset-12 col-sm-3 col-sm-offset-12 col-xs-12 col-xs-offset-12 ilham" style="margin:-1px;">
                    <form data-aos="zoom-in-down">
                        <h5>Lacak Aduan anda </h5>
                        <input class="form-control pa" type="text" placeholder="Ketik disini ..." autocomplete="off">
                        <button class="btn btn-primary btn-block" type="submit" style="width:100%;"><strong>LACAK</strong> </button>
                    </form>
                   <!-- <ul class="list-group ilhM2">
                        <li class="list-group-item"><span> </span>
                            <h5><strong>KOMPLAIN terhangat</strong> </h5></li>
                        <li class="list-group-item">
                            <p>meja rusak di raung tamu </p>
                        </li>
                        <li class="list-group-item"></li>
                    </ul>--
                </div>-->
		  	<?php
		  	}
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
     <!--STAR RANTING-->       
      <script>
function highlightStar(obj) {
	removeHighlight();		
	$('.li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $(".li").index(obj)) {
			return false;	
		}
	});

}

function removeHighlight() {
	$('.li').removeClass('selected');
	$('.li').removeClass('highlight');
}

function addRating(obj) {
	$('.li').each(function(index) {
		$(this).addClass('selected');
		$('#rating').val((index+1));
		if(index == $(".li").index(obj)) {
			return false;	
		}
		
	});
}

function resetRating() {
	if($("#rating").val()) {
		$('.li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $("#rating").val()) {
				return false;	
			}
		});
	}
}



</script>

<script type="text/javascript">
    function submitForm(action)
    {
        document.getElementById('form1').action = action;
        document.getElementById('form1').submit();
    }
</script>
            
    <script type="text/javascript">
	$(window).load(function() { 
	if($("#rating").val()) {
		$('.li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $("#rating").val()) {
				return false;	
			}
		});
		}
	 })
</script>
<!--<script type="text/javascript">
setInterval(function() { $("#load").load(""); }, 6000);
</script>-->
</body>

</html>