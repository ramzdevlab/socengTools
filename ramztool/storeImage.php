 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

    include'configue.php';
    

    $img = $_POST['image'];

    $folderPath = "upload/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);

    $fileName = uniqid() . '.png';

  

    $file = $folderPath . $fileName;

    file_put_contents($file, $image_base64);

  

    //print_r($fileName);
    $ids = addslashes($_POST['ids']);
    $author = addslashes($_POST['author']);
        //echo " ".$author;
        date_default_timezone_set("Asia/Bangkok");
        $link = "https://$_SERVER[HTTP_HOST]/ramztool/upload/".$fileName;
        $tanggal = date('d-m-Y');
        $jam = date('H:s');
        $sql=mysqli_query($koneksi, "INSERT INTO camera VALUES('0','$author','$ids','$link','$tanggal','$jam')");
        if($sql){
            $imagesDir = 'img/';

            $images = glob($imagesDir . '*.{gif}', GLOB_BRACE);
            
            $randomImage = $images[array_rand($images)];
            ?>
            <img src="<?php echo $randomImage;?>">
            <?php
        }else{
            echo "GAGAL";
        }
    
    

?>