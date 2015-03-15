<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Be Gracious</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="<?php echo base_url('jquery-2.0.3.min.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('jquery-ui/js/jquery-1.10.2.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('jquery-ui/js/jquery-ui-1.10.4.custom.js'); ?>" type="text/javascript" ></script>
    <!-- Le styles -->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.min.css'); ?>" rel="stylesheet">
    <!--<link href="<?php echo base_url(); ?>/assets/css/bootstrap-responsive.css" rel="stylesheet">-->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="body container"> <!-- body halaman -->
    <div align="center">
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
            <div class="nav-collapse collapse pull-right" align="left">
              <ul class="nav">
                <?php 
                  if ($this->user_model->is_logged_in()){ 
                    $user = $this->user_model->current_user();
                  ?>
                <li class="dropdown">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown">PROFILE</a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><?php echo $user->nama; ?></a></li>
                    <li><a href="<?php echo base_url('page/logout'); ?>">Logout</a></li>
                  </ul>
                </li>
                <?php }else{ ?>
                 <li class="dropdown">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown" onclick="focus_login();">LOGIN </a>
                  <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                    <h3> SIGN IN HERE </h3><br>
                    <form id="form-login">
                    <input id="user_username" placeholder="Type your e-mail" style="margin-bottom: 15px;" type="text" name="user[username]" size="30" />
                    <input id="user_password" placeholder="Type your password" style="margin-bottom: 15px;" type="password" name="user[password]" size="30" />
                    <input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user[remember_me]" value="1" />
                    <label class="string optional" for="user_remember_me"> Remember me</label>
                   
                    <input class="btn" id="btn-sign" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
                  </form>
                  </div>
                </li>
                <li><a href="<?php echo base_url('register'); ?>">REGISTER</a></li>
                <?php } ?>
                <li><a href="<?php echo base_url('page/cart'); ?>"><img src="<?php echo base_url(); ?>/assets/img/iconmonstr-shopping-cart-3-icon-24.png" height="17px" width="17px">  SHOPPING CART <?php if ($this->user_model->is_logged_in()){ echo "(".$this->cart_model->total($this->user_model->current_user()->id_user).")"; } ?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- TOP NAVBAR -->


      <!-- ========  LOGO  ======= -->
      <div class="logo"> <!--top logo-->
        <img src="<?php echo base_url(); ?>/assets/img/newlogo_small.png" width="120px" height="150px">
      </div> <!--top logo-->
    </div>
    

    <!-- ==========  IN NAVBAR ======= -->
    <div class="innavbar">
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <ul class="nav">
            <li><a href="<?php echo base_url(); ?>">SHOP</a></li>
            <li><a href="<?php echo base_url('page/payment') ?>">PAYMENT CONFIRMATION</a></li>
            <li><a href="#">TRACKING ORDER</a></li>
            <li><a href="#">SALE</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div><!-- /.navbar -->


    
    <div class="row-fluid">
        
        <!-- =========  SIDE NAVBAR  ====== -->
        <!-- side navbar -->
        <div class="span2">
          <div class="category sidebar-nav">
            <ul class="nav nav-list">
              <?php foreach($list_kategori as $row) { ?>
              <li><a href="<?php echo base_url('page/kategori').'/'.$row->id.'#content'; ?>"><?php echo $row->nama; ?><?php if ($kat == $row->id){ ?><i class="icon-chevron-right pull-right"></i><?php } ?></a></li>
              <?php } ?>
            </ul>
          </div><!--category -->
          <div class="category2 sidebar-nav">
            <ul class="nav nav-list">
              <li>SALE </li>
            </ul>
          </div>
          <!--<div class="category2 sidebar-nav">
            <ul class="nav nav-list">
              <li>E-GIFT CARD </li>
            </ul>
          </div>-->
      </div><!--/sidenavbar-->


        <?php $this->load->view($content); ?>
        <!-- Content -->


       
        


         <!-- ========  BOTTOM NAV ======= -->
        <div class="bottomnav">
          <div class="row-fluid">
            <div class="span4"><hr>
            </div>
            <div class="span4">
              <ul class="unstyled sosmed">
                <li><a href=""><img src="<?php echo base_url(); ?>/assets/img/bbm_pink.png" height="30px" width="30px"></a></li>
                <li><a href=""><img src="<?php echo base_url(); ?>/assets/img/iconmonstr-instagram-6-icon-24.png" height="30px" width="30px"></a></li>
                <li><a href=""><img src="<?php echo base_url(); ?>/assets/img/iconmonstr-facebook-3-icon-24.png" height="30px" width="30px"></a></li>
                <li><a href=""><img src="<?php echo base_url(); ?>/assets/img/iconmonstr-twitter-3-icon-24.png" height="30px" width="30px"></a></li>
                <li><a href=""><img src="<?php echo base_url(); ?>/assets/img/iconmonstr-blogger-icon-24.png" height="30px" width="30px"></a></li>
                <li><a href=""><img src="<?php echo base_url(); ?>/assets/img/iconmonstr-youtube-icon-24.png" height="30px" width="30px"></a></li>
              </ul>
            </div>
            <div class="span4"><hr>
            </div>
          </div>
          <div class="row-fluid">
            <div class="span5">
              <ul class="unstyled">
                <li class="nav-header">ORDER</li>
                <li class="nav-bot">Payment Confirmation</li>
                <li class="nav-bot">Tracking Order</li>
                <li class="nav-bot">How to Order</li>
              </ul>
            </div>
          <div class="span4">
              <ul class="unstyled">
                <li class="nav-header">PAYMENT</li>
                <li class="nav-bot"><a href=""><img src="<?php echo base_url(); ?>/assets/img/bca_bw.png" height="20px" width="60px"></a> <a href=""><img src="<?php echo base_url(); ?>/assets/img/bni_bw.png" height="20px" width="60px"></a> <a href=""><img src="<?php echo base_url(); ?>/assets/img/mandiri_bw.png" height="20px" width="60px"></a><a href=""><img src="<?php echo base_url(); ?>/assets/img/paypal_bw.png" height="20px" width="60px"></a></li>
              </ul>
            </div>
          <div class="span3">
              <ul class="unstyled">
                <li class="nav-header">SHIPPING</li>
                <li class="nav-bot"><a href=""><img src="<?php echo base_url(); ?>/assets/img/jne_bw.png" height="20px" width="60px"></a> 
                </li>
              </ul>
            </div>
          </div>
        </div>
        <footer>
          <p class="pull-right"><a href="#">Back to top</a></p>
          <p>&copy; BE GRACIOUS 2014-2017. All Rights Reserved. <a href="#">Privacy & Terms of Use</a></p>
        </footer>
        

        </div> 




      </div>
  

  </div> <!--body -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('jquery-2.0.3.min.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('jquery-ui/js/jquery-1.10.2.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('jquery-ui/js/jquery-ui-1.10.4.custom.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-typeahead.js"></script>
    <script>
        $(document).ready(function(){
          $("#form-login").submit(function(){
            $.ajax({
              type    : "POST",
              url     : "<?php echo base_url('ajax/login_user') ?>",
              data    : {
                username   : $("#user_username").val(),
                password   : $("#user_password").val()
              },
              success : function(html){
                if (html == "true"){
                  window.location = "<?php echo base_url(); ?>";
                }else{
                  alert("Login Gagal!");
                }
              }
            });
            return false;
          });
        });
    </script>
  </body>
</html>