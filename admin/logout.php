<?php 
    include('../config/constants.php');
    $_SESSION['logedout'] = "";
    header('location:'.SITEURL.'admin/login.php');
?>