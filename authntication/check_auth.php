<?php

if(!isset($_COOKIE['active_user'])){
    header("location:../view/index.php");
    exit();
}