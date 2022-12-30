<?php 
if(isset($_POST["submit"])){
    require "conn.php";
    $name = $_POST["user"];
    $pass = $_POST["pass"];

    require_once "functions.php";
    if(emptyLogin($name,$pass) !== false){
        header("location: ../login.php?error=empty");
       
        exit();

    }

    login($con,$name,$pass);


}
else{
    header("location: ../index.php");
    exit();
}