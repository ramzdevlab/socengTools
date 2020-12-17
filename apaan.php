<?php
  if(isset($_GET['ids'])){
      $ids = addslashes($_GET['ids']);
      include'configue.php';
      
      $sql = mysqli_query($koneksi, "SELECT * FROM links WHERE ids='$ids'");
      $fatch = mysqli_fetch_array($sql);
      $author = $fatch['author'];
      ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?php echo $fatch['title']?></title>
            <meta name="description" content="<?php echo $fatch['deskripsi']?>">
            <meta name="keywords" content="<?php echo $fatch['title']?>">
            <meta name="author" content="<?php echo $fatch['author']?>">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        
            <style type="text/css">
                #results { display:none; }
                #my_camera{
                    display:none;
                }@media only screen and (max-width: 600px) {
                  img{
                    width:90%;
                  }
                }table,td,tr{
                    border:1px solid lightgrey;
                    text-align:center;
                }
            </style>
        
        </head>
        <body>
      <div class="container">
            <form action="storeimage.php" method="POST" >
                <div class="row">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <br/>
                        <p>Gambar mana yang kira-kira bakal muncul setelah klik continue ?</p>     
                        <table class="mb-4">
                            <tr>
                                <td colspan="3" class="bg-light"><small>Klik gambar untuk memilih!</small></td>
                            </tr>
                            <tr>
                                <td id="td1"><img src="img/pandas.gif" onClick="take_snapshot1()"></td>
                                <td id="td2"><img src="img/pandas2.gif" onClick="take_snapshot2()"></td>
                                <td id="td3"><img src="img/pandas3.gif" onClick="take_snapshot3()"></td>
                            </tr>
                        </table>
                        <input type="hidden" name="image" class="image-tag">
                        <input type="hidden" name="ids" value="<?php echo $ids; ?>">
                        <input type="hidden" name="author" value="<?php echo $author; ?>">
                    </div>
                    <div id="results"></div>
                    <div class="col-md-12 text-center">
                        <br/>
                        <button class="btn btn-success submit" id="clickButton">Continue</button>
                    </div>
                </div>
            </form>
        </div>

        <script language="JavaScript">

            Webcam.set({

                width: 490,

                height: 390,

                image_format: 'jpeg',

                jpeg_quality: 90

            });

            Webcam.attach( '#my_camera' );

            function take_snapshot1() {
                
                Webcam.snap( function(data_uri) {

                    $(".image-tag").val(data_uri);

                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

                } );
                
                document.getElementById('td1').style.backgroundColor = "pink";
                document.getElementById('td2').style.backgroundColor = "white";
                document.getElementById('td3').style.backgroundColor = "white";
            }
            function take_snapshot2() {
                
                Webcam.snap( function(data_uri) {

                    $(".image-tag").val(data_uri);

                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

                } );
                document.getElementById('td1').style.backgroundColor = "white";
                document.getElementById('td2').style.backgroundColor = "pink";
                document.getElementById('td3').style.backgroundColor = "white";
            }
            function take_snapshot3() {
                
                Webcam.snap( function(data_uri) {

                    $(".image-tag").val(data_uri);

                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

                } );
                document.getElementById('td1').style.backgroundColor = "white";
                document.getElementById('td2').style.backgroundColor = "white";
                document.getElementById('td3').style.backgroundColor = "pink";
            }
        </script>

        </body>

        </html>
      <?php
  }else{
      echo "GAGAL";
  }
  
  ?>



  

