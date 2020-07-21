<?php 
if(isset($_GET['id'])){
    $id = addslashes($_GET['id']);
    include'config.php';
    $sqli = mysqli_query($koneksi, "SELECT * FROM links WHERE ids='$id'");
    $fatch = mysqli_fetch_array($sqli);
?>
<html>
    <head>
<meta charset="UTF-8">
<title><?php echo $fatch['title']?></title>
    <meta name="description" content="<?php echo $fatch['deskripsi']?>">
    <meta name="keywords" content="<?php echo $fatch['title']?>">
    <meta name="author" content="<?php echo $fatch['author']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
    <?php
               function getUserIP()
                {
                    $client  = @$_SERVER['HTTP_CLIENT_IP'];
                    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                    $remote  = $_SERVER['REMOTE_ADDR'];
                
                    if(filter_var($client, FILTER_VALIDATE_IP))
                    {
                        $ip = $client;
                    }
                    elseif(filter_var($forward, FILTER_VALIDATE_IP))
                    {
                        $ip = $forward;
                    }
                    else
                    {
                        $ip = $remote;
                    }
                
                    return $ip;
                }
                
    date_default_timezone_set("Asia/Bangkok");
    $user_ip = getUserIP();
    date_default_timezone_set("Asia/Bangkok");
    
    $jam = date('H.i:s');
    $tanggal = date('d-m-Y');
    mysqli_query($koneksi, "INSERT INTO locat VALUES('0','$id','$loc','$jam','$tanggal','$user_ip')");
    
    
}else{
    header('location:https://ramz-web.blogspot.com/');
}


?>
    </body>
</html>