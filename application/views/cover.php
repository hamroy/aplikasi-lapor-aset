
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="<?=base_url()?>images/<?=$logo?>.png"  />

   <title><?=$namapt?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>/dist/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?=base_url()?>/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url()?>/assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"> <b><?=$namapt?></b></h3>
              <ul class="nav masthead-nav">
                <li class="active"><a href="#">BERANDA</a></li>
                <li><a href="<?=base_url('Login/daftar')?>">DAFTAR</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">SELAMAT DATANG</h1>
            
            <p class="lead">
              <a href="<?=base_url('Login')?>" class="btn btn-lg btn-default">MASUK</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
             <p class="text-center"><?=date('Y')?> &copy;  <?=$namapt?></p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/assets/js/docs.min.js"></script>
  </body>
</html>
