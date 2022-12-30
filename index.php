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
    <?php 
        if(isset($_SESSION["Id"])){
            echo "<h1 style='color:#343148FF'>WELCOME</h1>";
        }
    ?>
    
   
    <section class="desc">
       <?php
            if(isset($_SESSION["Id"])){
                echo "<p>".$_SESSION['user']."</p>";
            } 
            else{
                echo '<p style="width: 800px; font-size: 2rem; line-height:2;">Welcome, this website was built for the purpose of utilizing databases with php/sql and organizing tasks under the "Tasks" option, in order to see the option and access this page you first will need to login, if you do not have a profile, then you may create one by clicking the "Sign up" option 
                (please type a random made up email when it asks with the correct format)';
            }
       ?>
    </section>
    <script src="app.js"></script>
</body>
</html>