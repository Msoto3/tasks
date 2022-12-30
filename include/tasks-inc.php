<?php

   if (isset($_POST['submit'])) {
    session_start();
    require_once "conn.php";
    $_SESSION['task'] = $_POST['toAdd'];
    $name = $_SESSION['user'];
    $t = $con -> real_escape_string($_SESSION['task']);
    //$task = $_SESSION['task'];
    $que = "INSERT INTO todo(name,task)
            VALUES('$name','$t')";
    $res = mysqli_query($con,$que);
    header("location: ../tasks.php");
  }
  else{
    header("location: ../tasks.php");
  }