
        <div class="span10">
          <div class="pagination pagination-mini">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Shop</a></li>
                  <li class="on"><a href="#">Nama Barang</a></li>
                </ul>
              </div>
          <div class="row-fluid">
            <?php $img = explode(";",$item->gambar); ?>
            <div class="item1 span5">
              <img src="<?php echo $img[0]; ?>">
            </div>
            <div class="item2 span2">
              <ul class="unstyled">
                <li><?php if($img[1] != '') echo "<img src=$img[1] >"; ?></li>
                <li><?php if($img[2] != '') echo "<img src=$img[2] >"; ?></li>
                <li><?php if($img[3] != '') echo "<img src=$img[3] >"; ?></li>
                <li><?php if($img[4] != '') echo "<img src=$img[4] >"; ?></li>
              </ul>
            </div>
            <div class="span5">
              <h2> <?php echo $item->nama; ?> </h2>
              <h3> IDR <?php echo number_format($item->harga,0,'','.'); ?> </h3>
              <?php 
                $size = explode(",",$item->ukuran);
               ?>
              <div style="margin-bottom:10px;">
                <b> Size: </b> 
                <?php foreach($size as $ukur) {?>
                <a href="#" onclick="add_size('<?php echo $ukur; ?>'); return false;" ><span class="label" id="<?php echo $ukur; ?>"><?php echo $ukur; ?> </span></a>
                <?php } ?>
                <input type="hidden" id="ukuran">
              </div>
              <b class="pull-right">Quantity :
              <select class="span5" style="color:#000000;margin-top:8px;width:50px;" id="quantity">
                <?php for ($i=0;$i<=5;$i++){ ?>
                <option value="<?php echo $i; ?>" style="color:#000000;"><?php echo $i; ?> </option>
                <?php } ?>
              </select> 
              </b>
              <a href="#" id="submit"><img src="<?php echo base_url('assets/img/add_2.png'); ?>" height="40px" width="160px"></a>
              <div class="pagination pagination-mini">
                <ul>
                  <li><a href="#">Add to wishlist</a></li>
                  <li><a href="#">Check Cart</a></li>
                  <li class="on"><a href="#">Continue Shopping</a></li>
                </ul>
              </div>
              <ul class="unstyled">
                <li>Kategori : <?php echo $this->kategori_model->get_kategori($item->kategori); ?></li>
                <li>Berat : <?php echo $item->berat; ?></li>
              </ul>
              <ul class="unstyled">
                <li>Bahan : <?php echo $item->bahan; ?></li>
              </ul>
            </div>
          </div>

  <script>
  function add_size(id)
  {
    <?php foreach($size as $ukur) {?>
    $("#<?php echo $ukur; ?>").removeClass("label-inverse");
    <?php } ?>
    $("#"+id).addClass("label-inverse");
    $("#ukuran").val(id);
  }
  $(document).ready(function(){
    $("#submit").click(function(){
      <?php if ($this->user_model->is_logged_in()){ ?>
      if (($("#ukuran").val() != "")&&($("#quantity").val() != 0)){
        $.ajax({
          type    : "POST",
          url     : "<?php echo base_url('ajax/add_cart') ?>",
          data    : {
            id_barang   : "<?php echo $item->id; ?>",
            ukuran      : $("#ukuran").val(),
            quantity    : $("#quantity").val()
          },
          success : function(html){
            if (html == "true"){
              window.location = "<?php echo base_url(); ?>";
            }else{
              alert("Gagal!");
            }
          }
        });
      }else{
        alert("Ukuran atau Quantity belum dipilih");
      }
      <?php }else{ ?>
      alert('Anda belum login!');
      <?php } ?>
      return false;
    });
  });
  function submit()
  {
    
  }
  </script>
          