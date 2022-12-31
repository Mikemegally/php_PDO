<?php

    include("../database/connection.php");
    use database\connection;
    use PDOException;
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $pss = password_hash($_POST['pas'],PASSWORD_DEFAULT);
        $confirm  = $_POST['cu'];

        try{
            $connection = connection::connect();
            if($email == false){
                $_SESSION['error'] = 'email format is incorrect';
                exit();
            }else{
                $result  = $connection ->prepare("SELECT * FROM users WHERE email = ?");
                $result ->bindParam(1, $email);
                $result ->execute();
                if($result ->rowCount()>0){
                    $_SESSION['error'] = 'email already exist';
                    header('location:'.$_SERVER['HTTP_REFERER']);
                    exit();
                }else{
                    $insert = $connection ->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
                    $insert ->bindParam(1,$name);
                    $insert ->bindParam(2,$email);
                    $insert ->bindParam(3,$pss);
                    $insert -> execute();

                    setcookie('active_user','active',time()+80,'/');
                    header('location:../view/home_page.php');
                    $_SESSION['sucess'] = 'you have registered sucessfully';
                    $_SESSION['name'] = "hello ".$name;
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
        header('location:../view/index.php');
        exit();
    }