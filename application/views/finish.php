      <div class="span10">
        <div class="row-fluid">
          <div class="span7">
            <h4> Terimakasih, <?php echo $user->nama; ?> </h4>
            <p> Pesanan anda dengan id <strong><?php echo $order->order_id; ?></strong> telah berhasil anda pesan <br>
             Cek email anda <strong><?php echo $user->username; ?></strong> untuk detail pesanan </p>
             <br>
             <div class="pesan">
              <p> Tolong lakukan pembayaran sebesar IDR <?php echo $order->total ?> <br>
              ke nomor rekening berikut : </p>
              <ul class="unstyled">
                <?php foreach ($bank as $row){ ?>
                <li><img src="<?php echo $row->img_bank; ?>" height="20px" width="60px"> <?php echo $row->no_rek; ?> an <?php echo $row->nama; ?> </li>
                <?php } ?>
              </ul>
              <p> Jangan lupa masukkan kode <strong><?php echo $order->order_id; ?></strong> saat melakukan pembayaran </p>
              <hr>
              <p class="text-warning"> <strong>Tolong lakukan pembayaran sebelum hari tanggal jam</strong> </p>

             </div>
             <br><br>
          </div>
          <div class="span5">
            <h4> Dikirim Ke: </h4>
            <p> Alamat : <?php echo $order->alamat; ?></p>
            <p> Kota : <?php echo $order->kota; ?></p>
            <p> Kode Pos : <?php echo $order->kode_pos; ?></p>
          </div>
        </div>
      </div>