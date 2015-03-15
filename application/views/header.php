<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Be Gracious</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>
assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 0px; /* 60px to make the container go all the way to the bottom of the topbar */
        padding-left: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        background-image: url('<?php echo base_url(); ?>
assets/img/background_1.png');
        font-family: "normal" ,Helvetica, Arial, sans-serif;
        color: #777777;
      }

      a{
        color: #777777;
      }

      .logo{
        text-align: center;
        display: block;
        position: relative;
        z-index:1040;
      }

      .body {
        margin: 0 auto;        
        background-color: white;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
      }

      .navbar-fixed-top .navbar-inner{
        background-color: #ff038b;
        border: 0px solid black;
      }

      .navbar-fixed-top .navbar-inner ul li .dot{
        list-style: disc;
      }

      .navbar-fixed-top .navbar-inner >a{
        color: white;
      }

      input,button 
      {
          background-color:transparent;
          border:0;
      }

      .navbar-fixed-top .nav > li > a {
        float: none;
        padding: 10px 15px 10px;
        color: #fafafa;
        text-decoration: none;
      }

      .container > hr {
        margin: 60px 0;
        }

      .innavbar .navbar{
        margin-top: 20px;
      }

      .navbar-inner{
        background-color: white;
        border-top: 1px solid #ff038b;
        border-bottom: 5px solid #ff038b;
        border-left: none;
        border-right: none;
      }

      .innavbar .container{
        margin-left: 100px;
        margin-right: 100px;
      }

      .innavbar li{
        margin-right: 20px ;
        margin-left: 20px ;
      }

      .category{
        border-top: 0px solid black;
        border-bottom:2px solid #ff038b;
        padding-left: 17px;
        color: #777777;
      }

      .category ul{
        list-style: disc;
      }
      .category li{
        margin-top: 10px;
        margin-bottom: 10px;
        font-size: 15px;
      }


      .category2 {
        border-top: none;
        border-bottom:2px solid #ff038b;
        font-size: 18px;
        color: #888888;  
      }

      .category2 li{
        margin-top: 10px;
        margin-bottom: 10px;
      }

      .btn{
        border: none;
        background-color: white;
      }

      .btn:hover{
        background-color: white;
      }

      .breadcrumb{
        background-color: white;
        font-size: 11px;
      }

      .carousel {
        margin-bottom: 10px;
      }

      .carousel .container {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
      }

      .carousel-control {
        background-color: transparent;
        border: 0;
        font-size: 120px;
        margin-top: 0;
        text-shadow: 0 1px 1px rgba(0,0,0,.4);
      }

      .carousel .item {
        height: 400px;
      }
      .carousel img {
        min-width: 100%;
        height: 400px;
        }

      .pagination{
        margin-top: 9px;
      }

      .pagination ul > li > a,
      .pagination ul > li > span {
        float: left;
        text-decoration: none;
        background-color: #ffffff;
        border: 0px solid #dddddd;
        margin-top: 0px;
      }

      .pagination ul > li:first-child > a,
      .pagination ul > li:first-child > span {
        border-left-width: 0px;
      }

      .navcontent{
        margin-bottom: -30px;
        font-size: 30px;
      }

      .navcontent .btn-group{
        margin-top: 9px;
      }

      

      .navcontent .sortbar{
        width: 120px;
        height: 35px;
        font-size: 10px;
      }

      .gallery{
        margin-top: 10px;
        padding: 0px;
        display: inline-block;
        
      }

      .galitem{
        height: 300px;
        margin: 5px;
        margin-bottom: 0px;
        padding: 5px;
        float: left;
        text-align: center;
      }

      .galitem img{
        max-width: 100%;
        height: 230px;
        display: inline;
      }

      .galitem .name{
        font-size: 15px;
        font-weight: bold;
      }

      .galitem .price{
        font-size: 15px;
        font-weight: normal;
      }
      .desc{
        text-align: left;
        font-weight: normal;
      }


      .special{
        margin-top: 30px;
        text-align: center;
        padding-bottom: 10px;
        margin-bottom: 30px;
      }

      .special img{
        margin-top: 20px;
      }

      .sosmed{
        display: block;
      }
      .sosmed li{
        float: left;
        margin-top: 5px;
        margin-right: 5px;
        margin-left: 5px;
      }
      .bottomnav{
        margin-top: 10px;
        border-top: 0px solid #ff038b;
        border-bottom: 1px solid #ff038b;
        display: block;
      }

      .nav-header{
        font-size: 17px;
        padding: 7px 15px;
      }

      .nav-bot{
        display: block;
        padding: 0px 15px;
        font-size: 11px;
        font-weight: bold;
        line-height: 20px;
        color: #999999;
        text-transform: uppercase;
      }
      
      footer{
        margin-top: 20px;
        font-size: 10px;
      }

      input,
        button {
            background-color:transparent;
            border:0;
        }

      hr {
        margin: 20px 0;
        border: 0;
        border-top: 1px solid #ff038b;
        border-bottom: 0px solid #ff038b;
      }

      .navbar-fixed-top input{
        color: #ff038b;
      }

      ::-webkit-input-placeholder {
        color: #ff038b;
      }
      :-moz-placeholder {
        color:#ff038b;
      }
      ::-moz-placeholder {
        color: #ff038b;
      }
      :-ms-input-placeholder {
        color:#ff038b;
      }

      @font-face {
        font-family: "Pink";
        src: url('<?php echo base_url(); ?>
assets/font/Pink.ttf') format("truetype");
      }

      @font-face {
        font-family: "normal";
        src: url('<?php echo base_url(); ?>
assets/font/kalinga.ttf') format("truetype");
      }

      .hot{
        padding-top: 10px;
        font-family: "Pink", sans-serif;
        font-weight: normal;
        color: #444444;
        font-size: 30px;
        margin-bottom: 10px;
      }
    </style>
    <!--<link href="<?php echo base_url(); ?>
assets/css/bootstrap-responsive.css" rel="stylesheet">-->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="body container"> <!-- body halaman -->

    <!-- ========== TOP NAVBAR ======= -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <form class="navbar-search pull-left">
            <input type="text" class="search-query" placeholder="Search">
            <button class="icon-search"></button>
          </form>
          <div class="nav-collapse collapse pull-right">
            <ul class="nav">
              <li><a href="#">LOGIN </a></li>
              <li><a href="#">REGISTER</a></li>
              <li><a href="#"><img src="<?php echo base_url(); ?>
assets/img/iconmonstr-shopping-cart-3-icon-24.png" height="17px" width="17px">  SHOPPING CART (1)</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- TOP NAVBAR -->


    <!-- ========  LOGO  ======= -->
    <div class="logo"> <!--top logo-->
    <div class="container">
      <img src="<?php echo base_url(); ?>
assets/img/logowithbrand_small.png" width="120px" height="150px">
    </div>
    </div> <!--top logo-->
    

    <!-- ==========  IN NAVBAR ======= -->
    <div class="innavbar">
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <ul class="nav">
            <li><a href="#">SHOP</a></li>
            <li><a href="#">PAYMENT CONFIRMATION</a></li>
            <li><a href="#">TRACKING ORDER</a></li>
            <li><a href="#">SALE</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div><!-- /.navbar -->