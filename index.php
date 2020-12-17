<?php 
include 'configue.php';
if(isset($_POST['username'], $_POST['password'])){
    $username= addslashes($_POST['username']);
    $pass=addslashes($_POST['password']);

    $query=mysqli_query($koneksi, "SELECT * FROM admin WHERE nama ='$username' && pass='$pass'");
    $cek= mysqli_num_rows($query);
    if ($cek > 0) {
      //memualai sesi 
      session_start();
      $_SESSION['status']="login";
      $_SESSION['username']="$username";
      //mengarahkan ke dashboard admin 
      header("location:home_dash.php");
    }else{
      //menampilkan error jika username password salah 
      $gagal = "Invalid Username and Password!";
    }
  }
 ?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
      img{
        width:400px;
      }label, h2{
        color:grey;
      }img:hover{
        width:420px;
        cursor:pointer;
      }body{
        background-color:lightgrey;
      }h2{
        font-family:OCR A Std;
      }
      @media only screen and (max-width: 600px) {
          img{
            display:none;
          }
        }
    </style>
    <meta charset="UTF-8">
    <title>{RamzTools}</title>
    <meta name="description" content="Social Engineering Tools">
    <meta name="keywords" content="soceng tools ">
    <meta name="author" content="FAHMI">
    </head>
    <body>
    
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
       
        <a class="navbar-brand text-light" href="/mahasiswa"><i style="font-size:18px" class="fa">&#xf0ad;</i>  { RamzTools }</a>

        
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          </ul>
          <!-- FORM LOGIN ADMIN -->
          
        </div>
      </nav>
      <!-- Body DAFTAR ADMIN -->
      <div class="container mt-4">
     
        <div class="row">
          <div class="col-md-6">
            <center><img src="img/tool.png" alt="Management" ></center>
            
          </div>
          <div class="col-md-6">
          <h2 class="mb-4">Login Tools</h2>
            <form  action="" method="POST">
            <label for="uname">Username</label>
              <input type="text" name="username" placeholder="Masukan Username" class="form-control mb-3" required>
              <label for="password">Password</label>
              <input type="password" name="password" placeholder="Masukan Password" class="form-control mb-3" required>
              <p class="mb-4"><?php 
              if(isset($gagal)){
                  echo $gagal;
              }else{
                  echo"";
              }
              
               ?></p>
              <button type="submit" class="btn btn-dark">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    
    </body>
</html>