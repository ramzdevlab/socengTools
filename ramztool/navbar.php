<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<?php 
//memulai sesi ketika admin berhasil login akun 
 session_start();

  if ($_SESSION['status'] != "login") {
    //redirect ke halaman login jika sesi telah berakhir
    header("location:index.php");
  }elseif($_SESSION['status'] == "login"){
  

    ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="home_dash.php"><i style="font-size:18px" class="fa">&#xf0ad;</i>  { RamzTools }</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i style="font-size:20px" class="fa">&#xf085;</i> Social Engineering
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="datalinkjs.php">Lacak Akurat 95% (Butuh Interaksi)</a>
          <a class="dropdown-item" href="datalinkip.php">Lacak Akurat 75% </a>
          <hr>
          <a class="dropdown-item" href="datalinkcam.php">Capture Picture </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="victim.php"> <i style="font-size:18px" class="fa">&#xf0c0;</i> Data Victim</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link " href="logout.php"> <i style="font-size:20px" class="fa">&#xf08b;</i> Keluar</a>
      </li>
    </ul>
  </div>
</nav>








<?php } ?>
</body>
</html>

