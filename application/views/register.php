
        <div class="span10">
          <div class="pagination pagination-mini">
                <ul>
                  <li><a href="#">Home</a></li>
                  <li class="on"><a href="#">Register</a></li>
                </ul>
              </div>
          <div class="row-fluid">

            <h4> Creating an Account</h4>
          <div class="span6">
            <form id="form-register">
            <ul class="unstyled">
              <li>Email Address <br><input id="email" type="text" placeholder="Type here"></li>              
              <li>Full Name <br><input id="nama" type="text" placeholder="Type here"></li>
              <li>Password <br><input id="pass1" type="password" placeholder="Type here"></li>
              <li>Re-Type Password <br><input id="pass2" type="password" placeholder="Type here"></li>
            </ul>
            <input type="submit" id="btn-register" value="">
          </div>
          <div class="span4">
            <ul class="unstyled"> 
              <li>Address<br> <input id="alamat" type="text" placeholder="Type here"></li> 
              <li>City<br> <input id="city" type="text" placeholder="Type here"></li> 
              <li>Postal Code <br><input id="kode_pos" type="text" placeholder="Type here"></li>
              <li>Mobile Phone <br><input id="no_hp" type="text" placeholder="Type here"></li>
            </ul>
            </form>
          </div>
          </div>

            <script>
              $(document).ready(function() {
                $("#city").autocomplete({
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
                $("#form-register").submit(function(){
                  if (($("#email").val() != "")&&
                      ($("#nama").val() != "")&&
                      ($("#pass1").val() != "")&&
                      ($("#pass2").val() == $("#pass1").val())&&
                      ($("#alamat").val() != "")&&
                      ($("#city").val() != "")&&
                      ($("#kode_pos").val() != "")&&
                      ($("#no_hp").val() != ""))
                  {
                      $.ajax({
                      type    : "POST",
                      url     : "<?php echo base_url('ajax/register') ?>",
                      data    : {
                        username   : $("#email").val(),
                        nama       : $("#nama").val(),
                        password   : $("#pass1").val(),
                        alamat     : $("#alamat").val(),
                        kota       : $("#city").val(),
                        kode_pos   : $("#kode_pos").val(),
                        no_hp      : $("#no_hp").val()
                      },
                      success : function(html){
                        if (html == "true"){
                          alert("Register berhasil. Silahkan login!");
                          window.location = "<?php echo base_url(); ?>";
                        }else{
                          alert("Register Gagal!");
                        }
                      }
                    });
                  }else{
                    alert("Data belum lengkap!");
                  }
                  return false;
                })
              });
            </script>