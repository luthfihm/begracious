
  <form action="<?php echo base_url('page/finish') ?>" method="post">
       <div class="span10">
          <div class="pagination pagination-mini">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li class="on"><a href="#">Register</a></li>
                </ul>
              </div>
          <div class="row-fluid">


          <div class="span6">
            <h4>Checkout</h4>
          <hr>
          
          <table class="table table-co">
            <thead></thead>
            <tbody>
              <tr>
                <td>alamat e-mail</td>
                <td>: <?php echo $user->username; ?></td>
              </tr>
              <tr>
                <td>Full Name</td>
                <td>: <?php echo $user->nama; ?></td>
              </tr>
              <tr>
                <td>Mobie Phone</td>
                <td>: <?php echo $user->no_hp; ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>: <input type="text" name="alamat" value="<?php echo $user->alamat; ?>"></td>
              </tr>
              <tr>
                <td>City</td>
                <td>: <input type="text" name="kota" id="kota" value="<?php echo $user->kota; ?>" onchange="GetOngkir();"></td>
              </tr>
              <tr>
                <td>Postal Code</td>
                <td>: <input type="text" name="kode_pos" value="<?php echo $user->kode_pos; ?>"></td>
              </tr>
            </tbody>
          </table>
          
          <h4>Shipping Option (JNE)</h4>
          <hr>
          <label class="radio">
            <input type="radio" name="peng" id="YES" value="Yakin Esok Sampai (YES)">
            Yakin Esok Sampai (YES)
          </label>
          <label class="radio">
            <input type="radio" name="peng" id="REG" value="Reguler (REG)" checked>
            Reguler (REG)
          </label>
          <label class="radio">
            <input type="radio" name="peng" id="OKE" value="Ongkos Kirim Ekonomis (OKE)">
            Ongkos Kirim Ekonomis (OKE)
          </label>
          <input type="hidden" name="pengiriman" id="pengiriman" value="Reguler (REG)">
            
          <br>
          <input type="submit" class="checkout" style="width:136px;height:34px;" value="" name="submit_checkout">
          </div>
          <div class="span6">
            <ul class="unstyled">
            <li>
            <div class="span12 prod">
              
              <h4> Order Summary (warna backgroud nunggu rosi) </h4>
              <?php 
              $total = 0;
              $berat_total = 0;
              $disc_total = 0;
              foreach ($cart as $row){ 
                $item = $this->barang_model->get_by_id($row->id_barang); 
                $img = explode(';', $item->gambar);
                $harga = $row->quantity*$item->harga;
                $total += $harga;
                $berat = $item->berat*$row->quantity;
                $berat_total += $berat;
                $disc = $item->harga_diskon*$row->quantity;
                $disc_total += $disc;
                ?>
              <table class="table">
                <tbody>
                  <tr>
                    <td class="span4"><img src="<?php echo $img[0]; ?>" height="150px" width="100px"></td>
                    <td class="span6">
                    <ul class="unstyled">
                      <li><h4><?php echo $item->nama; ?></h4></li>
                      <li>Size : <?php echo $row->ukuran; ?></li>
                      <li>Quantity : <?php echo $row->quantity; ?></li>
                      <li>Berat : <?php echo $berat; ?> kg</li>
                      <li>Diskon : Rp <?php echo $disc; ?> kg</li>
                      <li><h4>Rp <span><?php echo number_format($harga,0,'','.'); ?></span></h4></li>
                    </ul>
                    </td>
                  </tr>
                </tbody> 
              </table>
              <?php } ?>
          </div>
        </li>
        <li>
        <?php 
        $ongkir = $this->ongkir_model->GetOngkir($user->kota,$berat_total*1000,"Reguler (REG)"); 
        $grand_total = $total + $ongkir - $disc_total;
        ?>
           <div class="span12 prod">
            <h4>Order Summary (warna backgroud nunggu rosi) </h4>
            <table class="table">
              <tbody>
                <tr>
                  <td class="span4">Subtotal</td>
                  <td class="span6">: Rp <span><?php echo $total; ?></span></td>
                  <input type="hidden" id="total" name="total" value="<?php echo $total; ?>">
                </tr>
                <tr>
                  <td class="span4">Discount</td>
                  <td class="span6">: Rp <?php echo $disc_total; ?></td>
                  <input type="hidden" name="diskon" id="diskon" value="<?php echo $disc_total; ?>">
                </tr>
                <tr>
                  <td class="span4">Berat Total</td>
                  <td class="span6">: <?php echo $berat_total; ?> kg</td>
                  <input type="hidden" id="berat" name="berat" value="<?php echo $berat_total; ?>">
                </tr>
                <tr>
                  <td class="span4">Shipping</td>
                  <td class="span6">: Rp <span id="tampil_ongkir"><?php echo $ongkir; ?></span></td>
                  <input type="hidden" id="ongkir" name="ongkir" value="<?php echo $ongkir; ?>">
                </tr>
                <tr>
                  <td class="span4">Grand Total</td>
                  <td class="span6">: Rp <span id="grand_tampil"><?php echo $grand_total; ?></span></td>
                  <input type="hidden" name="grand_total" id="grand_total" value="<?php echo $grand_total; ?>">
                </tr>
              </tbody> 
            </table>
          </div>
          </li>
          
        </ul>
  </form>      
          </div>
          </div>
  <img src="" alt="">
          <script>
            function GetOngkir()
            {

              _kota = $("#kota").val();
              _berat = $("#berat").val()*1000;
              _service = $("#pengiriman").val();
              $.ajax({
                type : "POST",
                url : "<?php echo base_url('ajax/GetOngkir'); ?>",
                data : {
                  kota : _kota,
                  berat : _berat,
                  service : _service
                },
                success: function(html) {
                  $("#tampil_ongkir").html(html);
                  $("#ongkir").val(html);
                   total = +$("#total").val() + +$("#ongkir").val() - +$("#diskon").val();
                  $("#grand_tampil").html(total);
                  $("#grand_total").val(total);
                },
                beforeSend : function(){
                  $("#tampil_ongkir").html("<img src='<?php echo base_url('ui-anim_basic_16x16.gif') ?>' alt=''>");
                  $("#grand_tampil").html("<img src='<?php echo base_url('ui-anim_basic_16x16.gif') ?>' alt=''>");
                }
              });
            }
            $(document).ready(function(){
              $("#kota").autocomplete({
                source: function( request, response ) {
                  $.ajax({
                    url: "<?php echo base_url('ajax/list_city'); ?>/"+request.term,
                    dataType: "json",
                    success: function( data ) {
                      response($.map(data, function (value, key) {
                          return {
                              label: value,
                              value: value
                          };
                      }));
                    }
                  });
                },
              });
              $("#YES").click(function(){
                $("#pengiriman").val($("#YES").val());
                GetOngkir();
              });
              $("#REG").click(function(){
                $("#pengiriman").val($("#REG").val());
                GetOngkir();
              });
              $("#OKE").click(function(){
                $("#pengiriman").val($("#OKE").val());
                GetOngkir();
              });
            });
          </script>