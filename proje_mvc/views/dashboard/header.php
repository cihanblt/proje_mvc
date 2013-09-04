<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="iso-8859-9">
    <title>e-kentim.org | Admin Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Cihan BULUT">
    <script type="text/javascript" src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js" ></script>
    <script type="text/javascript" src="<?php echo URL;?>public/js/custom.js" ></script>
    
    <script type="text/javascript" src="<?php echo URL;?>public/js/custom.js"></script>
    <!-- Le styles -->
    <link href="<?php echo URL;?>public/css/bootstrap.css" rel="stylesheet">
    
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">e-kentim</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
                Hoşgeldiniz <a href="#" class="navbar-link"><?php echo Session::get('kadi');?></a>
            </p>
            <ul class="nav">
              <li class="active"><a href="?">Anasayfa</a></li>
              <li><a href="#about">Hakkımızda</a></li>
              <li><a href="logout/quit">Çıkış</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul id ="aktif" class="nav nav-list">
              <li class="nav-header">Admin Paneli</li>
              <li><a href="?go=site_islemleri">Site İşlemleri</a></li>
              <li><a href="?go=blok_islemleri">Blok İşlemleri</a></li>
              <li><a href="?go=daire_islemleri">Daire İşlemleri</a></li>
              <li><a href="?go=yonetici_islemleri">Yönetici İşlemleri</a></li>
              <li><a href="?go=sakin_islemleri">Apartman Sakini İşlemleri</a></li>
              <li><a href="?go=ev_sahibi_islemleri">Ev Sahibi İşlemleri</a></li>
              <li><a href="?go=hizmet_kategorisi">Hizmet Kategorisi</a></li>
              <li><a href="?go=hizmet_islemleri">Hizmet İşlemleri</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
            