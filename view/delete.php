<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>section2</title>
    <link rel="stylesheet" href="../css/section3.css?v=<?php echo time() ?>">
</head>
<body>
    <div class="conatiner">
        <h1>registration form</h1>
        <form action="../backend/delete_back.php" method="POST">
            <label for="username">username</label><br>
            <input type="text" id="username" name="name" placeholder="enter your username" required maxlength="50"><br>
            <p style="color:red;font-weight:bold;">
                <?php
                    if(isset($_SESSION['sucess'])){
                        echo $_SESSION['sucess'];
                        unset($_SESSION['sucess']);
                    }
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </p>
            <span>have an account? <a href="login.php">login instead</a> OR <a href="index.php">register</a></span>
            <button type="submit" name="btn">DELETE</button>
        </form>
    </div>
</body>
</html>