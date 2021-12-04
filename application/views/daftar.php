<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$namapt?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/readable/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.min.css">
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="<?=base_url()?>images/<?=$logo?>.png"  />
</head>

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
          <a class="navbar-brand" href="<?=base_url('welcome')?>"><?=$namapt?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=base_url('Login')?>">MASUK</a></li>	
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div>
        <div class="container">
            <div class="row ilham">
             <div class="col-lg-9 col-md-9 col-md-offset-2 col-sm-offset-2 col-sm-9 col-xs-12 u">
  
                   <div class="ilham12">
    <div class="well"><span class="judul">PENDAFTARAN</span></div>
    <form method="post" action="<?=base_url('login/daftar_simpan/')?>">
        <div class="form-group">
            <ul class="list-group">
                <li class="list-group-item"><span class="ilham lab">NAMA </span>
                    <input type="text" name="nama" placeholder="NAMA" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                <li class="list-group-item"><span class="ilham lab">USERNAME </span>
                    <input type="text" name="user" placeholder="USERNAME" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-danger">Email harus menggunakan @umy.ac.id</small>
                </li>
                <li class="list-group-item"><span class="ilham lab">PASSWORD</span>
                    <input type="password" name="pass" placeholder="PASSWORD" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                <br/>
                 <li class="list-group-item"><span class="ilham lab">Unit Kerja </span>
                    <input type="text" name="unit" placeholder="Unit Kerja" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                 <li class="list-group-item"><span class="ilham lab">JABATAN </span>
                    <input type="text" name="jabatan" placeholder="jabatan" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                </li>
                 <li class="list-group-item"><span class="ilham lab">No. HP</span>
                    <input type="text" name="no" required placeholder="no.hp / telpon" class="form-control ilhams" style="background-color:rgb(255,255,255);width:50%;" />
                    <small class="text-info">No. HP wajib diisi.</small>
                </li>
                
                <li class="list-group-item">
                    <button class="btn btn-default btn-block btn-lg ilham" data-aos="zoom-down" type="submit"><strong>DAFTAR</strong> </button>
                </li>
            </ul>
        </div>
    </form>
</div>

                </div>
              
              
            </div>
        </div>
        <div id="notifications" ><?php echo $this->session->flashdata('msg'); ?></div> 
    </div>
    <footer class="footerilahm">
    <p class="text-center"><?=date('Y')?> &copy;  <?=$namapt?></p>
</footer>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>
 <style>
    	#notifications {
    cursor: pointer;
    position: fixed;
    right: 0px;
    z-index: 9999;
    bottom: 0px;
    margin-bottom: 22px;
    margin-right: 15px;
    min-width: 300px; 
    max-width: 800px;  
}
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="<?=base_url()?>assets/js/script.min.js"></script>
</body>

</html>