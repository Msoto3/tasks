<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <nav>
            
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                    if (isset($_SESSION["Id"])) {
                       echo '<li ><a href="logout.php">Logout</a></li>';
                       echo '<li ><a href="tasks.php">Tasks</a></li>';
                    } 
                    else{
                        echo'<li><a href="signup.php">Sign up</a></li>';
                        echo'<li><a href="login.php">Login</a></li>';
                    }
                ?>
                
            </ul>
        

    </nav>

    <section class="desc">
        <div class="log">
            <form  action="include/login-inc.php" method="POST">
                <h1>Log In</h1>
                <input type="text" name="user" id="user" placeholder="Username/Email">
                <br>
                <input type="password" name="pass" id="pass" placeholder="password">
                <br>
                <br>
                <button class="btn" type="submit" name="submit">Log In</button>
            </form>

        </div>
       

    </section>
    <?php 
        if(isset($_GET["error"])){
            if ($_GET["error"]=="empty") {
                echo '<script>alert("Fill in all the fields")</script>';
            }
            else if($_GET["error"]=="invalidLog"){
                echo '<script>alert("invalid Login")</script>';
            }
        }
    ?>
    
</body>
</html>