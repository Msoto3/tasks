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
            <form  action="include/signup-inc.php" method="POST">
                <h1>Sign Up</h1>
                <input type="text" name="user" id="user" placeholder="create user">
                <br>
                <input type="email" name="email" id="email" placeholder="enter email">
                <br>
                <input type="password" name="pass" id="pass" placeholder="create password">
                <br>
                <input type="password" name="repeat" id="repeat" placeholder="confrim password" >
                <br>
                <br>
                <button class="btn" type="submit" name="submit">Sign Up</button>
            </form>

        </div>
       

    </section>

    <?php 
        if(isset($_GET["error"])){
            if ($_GET["error"]=="empty") {
                echo '<script>alert("Fill in all the fields")</script>';
            }
            else if($_GET["error"]=="invalidUser"){
                echo '<script>alert("invalid User")</script>';
            }
            else if($_GET["error"]=="invalidEmail"){
                echo '<script>alert("invalid Email")</script>';
            }
            else if($_GET["error"]=="noMatch"){
                echo '<script>alert("The password confrimed is not the same as the password you were trying to create.")</script>';
            }
            else if($_GET["error"]=="UserExists"){
                echo '<script>alert("username taken.")</script>';
                
            }
            else if($_GET["error"]=="queFailed"){
                echo '<script>alert("ERROR")</script>';
            }
        }
    ?>
    
</body>
</html>