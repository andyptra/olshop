<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">daftar sebagai pelanggan baru</h4>
      </div>
       
      <div class="modal-body">
   
        
       
        <div  id="signup">
            <form action="prosesdaftar.php" method="post" enctype="multipart/form-data"  class="form-horizontal" id="form">    
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="nama" class="col-md-3 control-label">nama</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nama" placeholder="nama" required="required">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" placeholder="username" required="required" >
                  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp" class="col-md-3 control-label">no hp</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="no_hp" placeholder="no hp" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwordku" placeholder="Password" required="required">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="alamat" class="col-md-3 control-label">alamat</label>
                                    <div class="col-md-9">
                                        <textarea name="alamat" class="form-control" rows="3" required="required"></textarea>
                                    </div>
                                </div>
                                
                                  <div class="form-group">
                           <label class="col-md-3 control-label">pertanyaan keamanan</label>
                           <div class="col-md-9">
                           <?php echo"<select  name='pertanyaan' class='form-control' required='required'>
                           <option value=0 selected>- Pilih pertanyaan -</option>";
                           $tampil=mysql_query("SELECT * FROM pertanyaan_keamanan ");
                           while($v=mysql_fetch_array($tampil)){
                           echo "<option value='$v[id_pertanyaan]'>$v[pertanyaan]</option>";
                           }
                           echo "</select>";?>
                           </div>
                        </div>
               <div class="form-group">
                                    <label for="jawaban" class="col-md-3 control-label">jawaban</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="jawaban" placeholder="jawaban" required="required">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="cc" class="col-md-3 control-label"> CAPTCHA</label>
                                    <div class="col-md-9">
                                        <img src="gambar.php" alt="gambar" />
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="CAPTCHA" class="col-md-3 control-label"> Isikan Captcha</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="nilaiCaptcha" placeholder="captcha" maxlength="6" required="required">
                                       
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp daftar</button>
                                         
                                    </div>
                                </div>
                                
                             
                                
                                
                                
                            </form>
  
    </div>
      </div>
     
    </div>
  </div>
</div>

<div class="modal fade loginbro" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">

    <div class="modal-content">
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login area user</h4>
      </div>
       
      <div class="modal-body">
   
        
       
        <div  id="login">
          <form action="proseslogin.php" method="post" enctype="multipart/form-data"  class="form-horizontal" id="loginku"> 
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                       <button type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Login</button>
                                      

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                          
                                        </a>lupa password
                                        <a href="resetpswd.php">
                                            reset password
                                        </a>
                                        </div>
                                        
                                    </div>
                                </div>    
                            </form>     
    </div>
      </div>
     
    </div>
  </div>
</div>


<div id="footer">
        <div class="container">
            <p class="footer-class">Copyright &copy; <?php echo date('Y') ?> |   All Rights Reserved </p>
        </div>
    </div>
</div>
<script src="admin/js/jquery.min.js" type="text/javascript"></script>
<script src="admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="owl-carousel/owl.carousel.js"></script>
 <script>
 	

    $(document).ready(function() {
     
      var time = 7; // time in seconds
     
      var $progressBar,
          $bar, 
          $elem, 
          isPause, 
          tick,
          percentTime;
     
        //Init the carousel
        $("#owl-demo").owlCarousel({
          slideSpeed : 500,
          paginationSpeed : 500,
          singleItem : true,
          afterInit : progressBar,
          afterMove : moved,
          startDragging : pauseOnDragging
        });
     
        //Init progressBar where elem is $("#owl-demo")
        function progressBar(elem){
          $elem = elem;
          //build progress bar elements
          buildProgressBar();
          //start counting
          start();
        }
     
        //create div#progressBar and div#bar then prepend to $("#owl-demo")
        function buildProgressBar(){
          $progressBar = $("<div>",{
            id:"progressBar"
          });
          $bar = $("<div>",{
            id:"bar"
          });
          $progressBar.append($bar).prependTo($elem);
        }
     
        function start() {
          //reset timer
          percentTime = 0;
          isPause = false;
          //run interval every 0.01 second
          tick = setInterval(interval, 10);
        };
     
        function interval() {
          if(isPause === false){
            percentTime += 1 / time;
            $bar.css({
               width: percentTime+"%"
             });
            //if percentTime is equal or greater than 100
            if(percentTime >= 100){
              //slide to next item 
              $elem.trigger('owl.next')
            }
          }
        }
     
        //pause while dragging 
        function pauseOnDragging(){
          isPause = true;
        }
     
        //moved callback
        function moved(){
          //clear interval
          clearTimeout(tick);
          //start again
          start();
        }
     
        //uncomment this to make pause on mouseover 
        // $elem.on('mouseover',function(){
        //   isPause = true;
        // })
        // $elem.on('mouseout',function(){
        //   isPause = false;
        // })
     
    });


 </script>
 <script src="plug/jquery.etalage.min.js"></script>

 <script src="plug/jquery.marquee.min.js"></script>

 <script>
 
   $(function() {
  $('.marquee').marquee();
});

 </script>
 <script language="javascript">
        $(function ()
        { $("#example").popover();
            $("#el3").popover();
        });
        function showPopup() {
            $('#el3').popover('show')
        }
        function hidePopup() {
            $('#el3').popover('hide')
        }
</script>
    <script>
      jQuery(document).ready(function($){

        $('#etalage').etalage({
          thumb_image_width: 200,
          thumb_image_height: 250,
          source_image_width: 900,
          source_image_height: 1200,
          show_hint: true,
          click_callback: function(image_anchor, instance_id){
            alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
          }
        });

      });
    </script>

     <script>
            $(document).ready(function(){
             jQuery("#list").load("page.php?page=1");
    jQuery("#pagination li").on('click',function(e){
  e.preventDefault();
    jQuery("#target-content").html('loading...');
    jQuery("#pagination li").removeClass('active');
    jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery("#list").load("page.php?page=" + pageNum);
    });
                $("#sortby").change(function(){
                    $.ajax({
                        method: "POST",
                        url: "page.php",
                        data: { sortby:$("#sortby").val() }
                    })
                    // Copy the AJAX response in the table
                    .done(function( msg ) {
                        $("#list").html(msg);
                    });
                });
            });
        </script>

<script src="uploads.js" type="text/javascript"></script>
  <script type="text/javascript" src="orakuploader/jquery-ui.min.js"></script>
  <script type="text/javascript" src="orakuploader/orakuploader.js"></script>
  <script src="plug/select2.min.js"></script>
<script type="text/javascript">
  $('#id_kota').select2();
</script>
<script type="text/javascript">
   $(document).ready(function(){
      
  
   //jika ada perubahan di kode barang
                    $("#id_kota").change(function(){
                        kode=$("#id_kota").val();
                        
                       
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"ongkirauto.php",
                            data:"kode="+kode,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
                $("#id_kota").val(data[0]);
                                $("#nama_kota").val(data[1]);
                                 $("#tarif").val(data[2]);
                               
                                
                                
                                
                            }
                        });
                    });
      
      
  });

  
  </script>
</body>
</html>
