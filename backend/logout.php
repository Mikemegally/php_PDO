<?php
    setcookie('active_user','',time()-80,'/');
    header('location:../view/login.php');
    exit();