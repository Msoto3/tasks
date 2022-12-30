<?php
session_start();
function emptySignup($name,$email,$password,$passRepeat){
    $res = false;
    
    if(empty($name)||empty($email)||empty($password)||empty($passRepeat)){
        $res = true;
    }
   
    return $res;
}

function invalidUser($name){
    $res = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$name)){
        $res = true;
    }
    return $res;
}
function invalidEmail($email){
    $res = false;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $res = true;
    }
    return $res;
}
function PassMatch($password,$passRepeat){
   
    if($password!==$passRepeat){
        return true;
    }
    else{
        return false;
    }
}

function existsUser($con,$name,$email){
    $sql = "SELECT * FROM users 
            WHERE usersName = ? OR usersEmail = ?";
    $que = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($que,$sql)){
        header("location: ../signup.php?error=queFailed");
        exit();
    }

    mysqli_stmt_bind_param($que,"ss",$name,$email);
    mysqli_stmt_execute($que);

    $results = mysqli_stmt_get_result($que);

    if ($row = mysqli_fetch_assoc($results)) {
        return $row;
    }
    else{
        $res = false;
        return $res;

    }
    

    mysqli_stmt_close($que);
}


function createUser($con,$name,$email,$password){
    $sql = "INSERT INTO users(usersName,usersEmail,usersPWD)
            VALUES(?,?,?)";
    $que = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($que,$sql)){
        header("location: ../signup.php?error=queFailed");
        exit();
    }

    //to protect against hackers from getting all passwords
    $passHash = password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($que,"sss",$name,$email,$passHash);
    mysqli_stmt_execute($que);
    mysqli_stmt_close($que);

    
    header("location: ../signup.php?error=none");
    exit();

    

}



//login
function emptyLogin($name,$pass){
    $res = false;
    
    if(empty($name)||empty($pass)){
        $res = true;
    }
   
    return $res;
}
function login($con,$name,$pass){
    $User = existsUser($con,$name,$name);
    if($User===false){
        header("location: ../login.php?error=invalidLog");
        exit();
    }
    $passGrab = $User["usersPWD"];
    $passValid = password_verify($pass,$passGrab);

    if($passValid===false){
        header("location: ../login.php?error=invalidLog");
        exit();
    }
    else if($passValid===true){
        
        $_SESSION["user"] = $User["usersName"];
        $_SESSION["Id"] = $User["usersId"];
        header("location: ../index.php");
        exit();
    }
}