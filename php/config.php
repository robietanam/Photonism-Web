<?php 
    $conn = mysqli_connect("localhost", "root", "", "app_chat");
    if(!$conn){
        echo "Database Terkoneksi" . mysqli_connect_error();
    }
?>