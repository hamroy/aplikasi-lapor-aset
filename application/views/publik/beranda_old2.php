<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/readable/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-default il">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">SIM OOMPLINE</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="#" class="il">LOGIN </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bawahbg">
        <div class="jumbotron ilham" data-bs-hover-animate="bounce">
            <h2 class="hidden-xs">Selamat Datang di <strong>SIM Compline</strong></h2>
            <h5 class="visible-xs">Selamat Datang di <strong>SIM Compline</strong></h5>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row ilham">
            <?php
            ///view isi
            $this->load->view($view);
            ///view isi
            
            ?>
              
                <div class="col-lg-3 col-lg-offset-12 col-md-3 col-md-offset-12 col-sm-3 col-sm-offset-12 col-xs-12 col-xs-offset-12 ilham" style="margin:-1px;">
                    <form data-aos="zoom-in-down">
                        <h5>Lacak Aduan anda </h5>
                        <input class="form-control pa" type="text" placeholder="Ketik disini ..." autocomplete="off">
                        <button class="btn btn-primary btn-block" type="submit" style="width:100%;"><strong>LACAK</strong> </button>
                    </form>
                    <ul class="list-group ilhM2">
                        <li class="list-group-item"><span> </span>
                            <h5><strong>Compline terhangat</strong> </h5></li>
                        <li class="list-group-item">
                            <p>meja rusak di raung tamu </p>
                        </li>
                        <li class="list-group-item"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer class="footerilahm">
    <p class="text-center">sim KOmplin</p>
</footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="<?=base_url()?>assets/js/script.min.js"></script>
</body>

</html>