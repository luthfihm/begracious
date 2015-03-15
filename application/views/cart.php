<div class="span10">
              <div class="pagination pagination-mini">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li class="on"><a href="#">Shopping Cart</a></li>
                </ul>
              </div>
          <div class="row-fluid">
          <form action="<?php echo base_url('page/checkout'); ?>" method="post">
            <h3>Shopping Cart</h3>
            <table class="table">
            <thead>
              <tr>
                <th colspan="2">Desription</th>
                <th style="text-align:center;">Size</th>
                <th style="text-align:center;">Quantity</th>
                <th>Price</th>
                <th style="text-align:center;">Remove</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cart as $row){ ?>
              <tr>
                <input type="hidden" name="id[]" value="<?php echo $row->id; ?>">
                <?php 
                $item = $this->barang_model->get_by_id($row->id_barang); 
                $img = explode(';', $item->gambar);
                ?>
                <td><img src="<?php echo $img[0]; ?>" width="150px"></td>
                <td>
                  <div class="span8">
                    <h4><?php echo $item->nama; ?></h4>
                  </div> 
                  </td>
                <td style="text-align:center;"><?php echo $row->ukuran; ?></td>
                <td style="text-align:center;">
                  <select class="span8" style="color:#000000;" name="quantity[]">
                    <?php for ($i=1;$i<=5;$i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if ($row->quantity==$i) echo "selected"; ?>><?php echo $i; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td width="80px"><span>Rp</span> <span class="pull-right"><?php echo number_format($item->harga,0,'','.'); ?></span></td>
                <td style="text-align:center;"><a href="#" onclick="del_cart(<?php echo $row->id; ?>); return false;"><i class="icon-remove"></i></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          
          <input type="submit" style="background:url('<?php echo base_url('assets/img/conf_2.png'); ?>') no-repeat;width:171px;height:47px;" class="pull-right" value="" name="submit_cart">
        </form>
        </div>
<script>
  function del_cart(id_cart)
  {
    if (confirm("Yakin untuk menghapus?")){
      $.ajax({
        type      : "POST",
        url       : "<?php echo base_url('ajax/del_cart') ?>",
        data      : {
          id : id_cart
        },
        success   : function(html){
          if (html == "true"){
            window.location = location.href;
          }else{
            alert("Gagal menghapus");
          }
        }
      });
    }
  }
</script>