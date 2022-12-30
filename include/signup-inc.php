<?php



if(isset($_POST["submit"])){
    require 'conn.php';
    $name = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $passRepeat = $_POST["repeat"];

    
    require_once "functions.php";
    //error handling
    if(emptySignup($name,$email,$password,$passRepeat) !== false){
        header("location: ../signup.php?error=empty");
       
        exit();

    }
    else if(invalidUser($name)!==false){
        header("location: ../signup.php?error=invalidUser");
        exit();
    }
    else if(invalidEmail($email)!==false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    else if(PassMatch($password,$passRepeat)!==false){
        header("location: ../signup.php?error=noMatch");
        exit();
    }
    
    if(existsUser($con,$name,$email)!==false){
        header("location: ../signup.php?error=UserExists");
        exit();
    }
   
    createUser($con,$name,$email,$password);




}
else{
    header("location: ../signup.php");
    exit();
}