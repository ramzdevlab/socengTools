
<?php
include'configue.php';
if(isset($_GET['id'])){
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
    $user_ip = getUserIP();
    date_default_timezone_set("Asia/Bangkok");
    $ids = addslashes($_GET['ids']);
    $loc = addslashes($_GET['id']);
    $jam = date('H:s');
    $tanggal = date('d-m-Y');
    $sql = mysqli_query($koneksi, "INSERT INTO locat VALUES('0','$ids','$loc','$jam','$tanggal','$user_ip')");
    if($sql){
        echo "SUKSES";
    }else{
        echo "GAGAL";
    }
}else{
    header('location:https://google.com');
}


?>