

<div class="span10">
  

  <!-- Carousel
  ================================================== -->
  <div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo base_url(); ?>/assets/img/sale1.jpg" alt="">
       
      </div>
      <div class="item">
        <img src="<?php echo base_url(); ?>/assets/img/sale2.jpg" alt="">
        
      </div>
      <div class="item">
        <img src="<?php echo base_url(); ?>/assets/img/sale3.jpg" alt="">
        
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
  </div><!-- /.carousel -->


<!-- =============  CONTENT  ======== -->
<div class="navcontent" id="content">
  <div class="row-fluid">
    <div class="span5">
    <ul class="breadcrumb">
      <li><a href="#">Showing Item 1 - 40 of 1000</a> <span class="divider">&middot;</span></li>
      <li>Show all</li><br>
      <li>CATEGORY: All </li>
    </ul>
    </div>

    <div class="span3">
      <div class="pagination pagination-mini">
        <ul>
          <li><a href="#">Prev</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">Next</a></li>
        </ul>
      </div>
    </div>

    <div class="span4">
      <ul class="breadcrumb">
        <li>Sort By </li>
        <li><select class="sortbar">
            <option>Default</option>
            </select></li>
      </ul>
    </div>
  </div>
</div>

<div class="gallery">
  <?php 
  foreach ($list_barang as $row){ 
  $img = explode(";",$row->gambar);
    ?>
  <div class="galitem">
    <a href="<?php echo base_url('page/item').'/'.$row->id; ?>"><img src="<?php echo $img[0]; ?>"></a>
    <div class="desc">
      <b class="name"><?php echo $row->nama; ?></b><br> <b class="price">IDR <?php echo number_format($row->harga,0,'','.'); ?> </b>
    </div>
  </div>
  <?php } ?>
</div> <!--gallery-->

<div class="navcontent">
  <div class="row-fluid">
    <div class="span5">
    <ul class="breadcrumb">
      <li><a href="#">Showing Item xx of xx</a> <span class="divider">|</span></li>
      <li>Sorting Type</li>
    </ul>
    </div>

    <div class="span3">
      <div class="pagination pagination-mini">
        <ul>
          <li><a href="#">Prev</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">Next</a></li>
        </ul>
      </div>
    </div>

    <div class="span3">
      <div class="btn-group pull-right">
        <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown">Sort By
          <i class=" icon-plus"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a href="#">Sorting Type 1</a></li>
          <li><a href="#">Sorting Type 2</a></li>
          <li><a href="#">Sorting Type 3</a></li>
        </ul>
      </div>
    </div>
  </div>
<!-- Content -->