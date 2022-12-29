<?php

include("../database/connection.php");
use database\connection;
use PDOException;
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['name'];
    try{
        $connection = connection::connect();
        $delete = $connection ->prepare("DELETE FROM users WHERE name = ?");
        $delete ->bindParam(1,$username);
        $delete ->execute();
        $_SESSION['sucess'] = 'YOUR ACCOUNT DELETED SUCESSFULY';
        header('location:'.$_SERVER['HTTP_REFERER']);

    }catch(PDOException $ex){
        $_SESSION['error'] = 'error occured';
        $file = '../looger/logger.php';
        $fileopen = fopen($file,'a+');
        fwrite($fileopen,":::".$ex->getMessage());
        fclose($fileopen);
        header('location:'.$_SERVER['HTTP_REFERER']);
    }


}else{
    header('location:../view/delete.php');
    exit();
}