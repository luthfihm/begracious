<div class="span10">
  <div class="pagination pagination-mini">
    <ul>
      <li><a href="#">Home</a></li>
      <li class="on"><a href="#">Payment Confirmation</a></li>
    </ul>
  </div>
  <form action="<?php echo base_url('page/payment_confirm') ?>" method="post" id="pay">
    <div class="row-fluid">
      <div class="span12">
        <h4> Confirm Payment</h4>
      </div>
      <div class="span4">
        <ul class="unstyled">
          <li>Order ID <input type="text" placeholder="order ID" id="order_id" name="order_id"></li>              
          <li>
            Payment To 
            <select style="color:#FF038B;" id="id_bank" name="id_bank">
              <option value="">Select Bank</option>
              <?php foreach ($bank as $row) { ?>
              <option value="<?php echo $row->id_bank ?>"><?php echo $row->nama_bank; ?></option>
              <?php } ?>
            </select>
          </li>
          <li>Payment From (Nama Bank) <input type="text" placeholder="Payment From" id="from" name="from"></li>
          <li>Account Name <input type="text" placeholder="Account Name" id="account_name" name="account_name"></li>
        </ul>
        <br><br>
      </div>
      <div class="span4">
        <ul class="unstyled">        
          <li>Total Amount <input type="text" placeholder="Total Amount" id="total" name="total"></li>
          <li>Payment Date <input type="text" placeholder="Payment Date" id="date" name="date" readonly=""></li>
          <li>Note <input type="text" placeholder="Type your Note" id="note" name="note"></li>
        </ul>
        <div align="center" style="padding-top:7px;">
          <input type="submit" class="submit-pay" style="width:157px;height:34px" value="">
        </div>
      </div>
    </div>
  </form>
</div>
<script>
  $(document).ready(function(){
    $("#date").datepicker({ dateFormat: 'yy-mm-dd' });
    $("#pay").submit(function(){
      $.ajax({
        url   : "<?php echo base_url('ajax/validate_order_id') ?>",
        type  : "POST",
        data  : {
          order_id : $("#order_id").val()
        },
        success : function(html){
          if (html == "true"){
            if (($("#id_bank").val() != "")&&
                ($("#from").val() != "")&&
                ($("#account_name").val() != "")&&
                ($("#total").val() != "")&&
                ($("#date").val() != ""))
            {
              $.ajax({
                type    : "POST",
                url     : "<?php echo base_url('ajax/payment') ?>",
                data    : {
                  order_id      : $("#order_id").val(),
                  id_bank       : $("#id_bank").val(),
                  from          : $("#from").val(),
                  account_name  : $("#account_name").val(),
                  total         : $("#total").val(),
                  date          : $("#date").val(),
                  note          : $("#note").val()
                },
                success : function(html){
                  if (html == "true"){
                    alert("Konfirmasi pembayaran anda segera kami proses. Terima kasih");
                    window.location = "<?php echo base_url(); ?>";
                  }else{
                    alert("Gagal!");
                  }
                }
              });
            }
            else
            {
              alert("Data Belum Lengkap!");
            }
          }else{
            alert("Order ID tidak valid!");
          }
        }
      });
      
      return false;
    });
  });
</script>