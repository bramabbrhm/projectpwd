<?php 

    session_start();
    session_destroy();
    header("location:loginadmin.php?pesan=logout");

?>