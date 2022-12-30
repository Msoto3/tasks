<?php
    session_start(); 
    $name = $_SESSION['user'];
    $bool = false;
    require_once("include/conn.php");
    $que = "SELECT * FROM todo";
    $res = mysqli_query($con,$que);
    if (mysqli_num_rows($res)>0) {
        $bool = true;
        $que2 = "SELECT * FROM todo
                WHERE todo.name='$name'";
        $res2 = mysqli_query($con,$que2);      
    }
    else{
        $bool = false;
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tasks.css">
    <title>Tasks</title>
    <style>
        .delete{
            color: crimson;
            cursor: pointer;
            margin: 0 0.5rem;
            font-weight: 700;
            text-transform: uppercase;
        }
    </style>
    
</head>
<body>
    <input style="display: none;" type="text" value="<?php echo $_SESSION["user"]?>" id="user" name="user">
        <nav>
            
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                    if (isset($_SESSION["Id"])) {
                       echo '<li ><a href="logout.php">Logout</a></li>';
                    } 
                    else{
                        header("location: index.php");
                        
                    }
                ?>
                
            </ul>
        

        </nav>
    <header>
        <h1>Your Tasks</h1>
        <form action="include/tasks-inc.php" id="tasks" method="POST">
            <input name="toAdd" type="text" id="toAdd" placeholder="New Task">
            <input name="submit" type="submit" value="Add" id="submit">
        </form>
    </header>
    <main>
        <div class="list">
            <h2>Tasks</h2>
            <?php
                if ($bool) {
                    while($row = mysqli_fetch_assoc($res2)){
            ?>
                <form id="item" action="include/del.php" method="post">
                <div class="content">
                            <input style="width: 100%;" name="text" type="text" class="text" value="<?php echo $row['task']?>" readonly>
                        </div>
                        <div  class="action">
                                <button style="font-size: 1.5rem;" name="delete" class="delete">Done</button>
                            
                        </div>


                </form>
                

            
                    



                
                
            <?php     }
                }
               
              
                
            ?>
           
            
        </div>
    </main>
    
 
</body>
</html>
