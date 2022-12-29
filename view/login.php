<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/section3.css?v=<?php echo time() ?>">
</head>
<body>
    <div class="conatiner">
        <h1>login</h1>
        <form action="../backend/login_back.php" method="POST">
            
        <label for="email">email</label><br>
            <input type="email" id="email" name="email" placeholder="enter your mail" required maxlength="50"><br>


            <label for="password">password</label><br>
            <input type="password" id="password" name="pa" placeholder="enter your password" required maxlength="50"><br>
            <P style="color:red;font-weight:bold;">
                <?php
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </P>
            <button type="submit" name="btn">login</button>
            <span> dont have an account? <a href="index.php">register</a> </span>
        </form>
    </div>
</body>
</html>