<?php
    include_once("connect2.php");
    $isbn=$_GET['isbn'];
    $delete= mysqli_query($con, "DELETE FROM buku WHERE isbn='$isbn'");
    header("Location:index.php");
?>