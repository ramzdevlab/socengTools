<?php 
session_start();
//menghancurkan sesi yang telah dibuat di proses login admin menuju dashboard
session_destroy();
header("location:index.php");
