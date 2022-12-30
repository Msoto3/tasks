<?php
if (isset($_POST['delete'])) {
    session_start();
    require_once "conn.php";
    $_SESSION['task'] = $_POST['text'];
    $t = $_SESSION['task'];
    $que = "DELETE FROM todo WHERE task='$t'";
    $res = mysqli_query($con,$que);
    header("location: ../tasks.php");

}
else{
    header("location: ../tasks.php");
}
