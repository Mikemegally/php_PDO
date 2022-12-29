<?php
 session_start();
 require("../authntication/check_auth.php");
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
    <h1 style="color:red;font-weight:bold;">
        <?php
            if(isset($_SESSION['name'])){
                echo $_SESSION['name'];
                unset($_SESSION['name']);
            }
        ?>
    </h1>
    <p style="color:red;font-weight:bold;">
        <?php
            if(isset($_SESSION['sucess'])){
                echo $_SESSION['sucess'];
                unset($_SESSION['sucess']);
            }
        ?>
    </p>
    <a href="../backend/logout.php">logout</a>
   
</div>
</body>
</html>