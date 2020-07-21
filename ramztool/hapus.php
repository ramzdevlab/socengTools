<?php
include'configue.php';
    //menangkap nim yang dilempar dari form hapus data
    $ids = addslashes($_POST['ids']);
    //query hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM links WHERE ids='$ids'");
    $hapus = mysqli_query($koneksi, "DELETE FROM locat WHERE ids='$ids'");
    if($hapus){
        header('location:datalinkjs.php');
    }else{
        echo "GAGAL HAPUS DATA ";
    }

?>