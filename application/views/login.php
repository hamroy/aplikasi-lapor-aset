<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login <?= $namapt ?> </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="aplikasi keluhan kerusakan sarana dan prasarana">
  <meta name="author" content="hamroy || sediakoding">

  <!-- Le styles -->
  <link href="<?= base_url() ?>boot3_login/bootstrap.css" rel="stylesheet">
  <style type="text/css">
    body {
      padding-top: 80px;
      padding-bottom: 40px;
    }

    body {

      height: 100%;

      background-color: #ffffff;
      /*background: url("http://localhost/peg_smk_muhiwon/images/") no-repeat center center fixed; */

      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;


    }



    .form-signin {
      max-width: 300px;
      padding: 19px 29px 29px;
      margin: 0 auto 20px;
      background-color: #fff;
      border: 1px solid #e5e5e5;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
      -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
      box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }

    .form-signin input[type="text"],
    .form-signin input[type="password"] {
      font-size: 16px;
      height: auto;
      margin-bottom: 15px;
      padding: 7px 9px;
    }

    p {
      color: #ffffff;
    }
  </style>
  <link href="<?= base_url() ?>boot3_login/bootstrap-responsive.css" rel="stylesheet">

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
  <link rel="manifest" href="images/favicon/site.webmanifest">
  <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>

<body>
  <div class="navbar navbar-warning navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">

        <a class="brand text-center" href="#"><img src="<?= base_url() ?>images/<?= $logo ?>.png" class="img-thumbnail" width="100" /> | <?= $simlong ?> </a>
      </div>
    </div>
  </div>

  <div class="wrap">
    <div class="container">
      <?php
      $attributes = array('name' => 'login_form', 'class' => 'form-signin', 'style' => 'background:' . $warna2);

      echo form_open('login/prosesadmin', $attributes);
      $message = $this->session->flashdata('pesan');
      $messageok = $this->session->flashdata('pesanok');
      echo $message == '' ? '' : '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><p class="text-center">' . $message . '</p></div>';
      echo $messageok == '' ? '' : '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p class="text-center">' . $messageok . '</p></div>';
      ?>
      <h2 class="form-signin-heading">Silahkan Masuk</h2>
      <input type="text" class="input-block-level" placeholder="Username" name="username">
      <input type="password" class="input-block-level" placeholder="Password" name="password">


      <!--   <label class="checkbox">
          <input type="checkbox" value="remember-me"> Ingatkan saya
        </label>-->
      <button class="btn btn-large btn-success btn-block" type="submit">MASUK</button>
      <a class="btn btn-large btn-danger btn-block" href="<?= base_url('Login/daftar') ?>" type="button">DAFTAR</a>
      <br><br>
      <!--<a href="<?= base_url() ?>download/modul_penganggaran.pdf" class="btn btn-success">Unduh Manual Penganggaran SIMAKU-PT</a>-->
      </form>

    </div> <!-- /container -->
  </div>
  <div class="footer" align="center">
    <p class="text-muted" align="center"> <?= date('Y') ?> &copy; <?= $namapt ?> </p>
  </div>

  <!-- Le javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?= base_url() ?>boot3_login/js/jquery-1.8.0.min.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-transition.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-alert.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-modal.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-dropdown.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-scrollspy.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-tab.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-tooltip.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-popover.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-button.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-collapse.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-carousel.js"></script>
  <script src="<?= base_url() ?>boot3_login/js/bootstrap-typeahead.js"></script>

</body>

</html>