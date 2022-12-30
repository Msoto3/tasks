<?php
            //Makes DB connection 127.0.0.1
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projects";
            $con=mysqli_connect($servername,$username,$password,$dbname);
            if (mysqli_connect_errno())
            {
               die("Failed to connect to MySQL: " . mysqli_connect_error());
            }
            
           
?>