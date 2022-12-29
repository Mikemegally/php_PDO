<?php

include("../database/connection.php");
use database\connection;
use PDOException;
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $pass = $_POST['pa'];

    try{
        $connection = connection::connect();
        $query = $connection ->prepare("SELECT * FROM users WHERE email = ?");
        $query ->bindParam(1,$email);
        $query ->execute();
        if($query ->rowCount() ==0){
            $_SESSION['error'] = 'invalid cerdintials!';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
        }else{
           $user_data = $query ->fetch();
           if(password_verify( $pass,$user_data['password'])){

            setcookie('active_user','active',time()+80,'/');
            header('location:../view/home_page.php');
            $_SESSION['name'] = "hello ".$user_data['name'];
            $_SESSION['sucess'] = 'wlecome back ' . $email;
            exit();

           }else{
            $_SESSION['error'] = 'inncorect password';
            header('location:'.$_SERVER['HTTP_REFERER']);
            exit();
           }

        }


    }catch(PDOException $ex){
        $_SESSION['error'] = 'error occured';
        $file = "../looger/logger.php";
        $fileopen = fopen($file,'a+');
        fwrite($fileopen,":::".$ex->getMessage());
        fclose($fileopen);
        header('location:'.$_SERVER['HTTP_REFERER']);
    }

}else{
    header('location:../view/login.php');
    exit();
}