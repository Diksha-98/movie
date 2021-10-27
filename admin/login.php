<?php require_once("../include/connect.php");
session_start();
if(isset($_SESSION['admin_log'])){
    redirect ('index');
}
?>






<html>
    <head>
        <title>movie</title>
             <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        
    </head>
    <body>
      <?php include "navbar.php";?>
      
      
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 mx-auto bg-white">
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label>username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="mb-3">
                            <label>password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            
                            <input type="submit" class="btn btn-success btn-block" name="admin_login">
                        </div>
                    </form>
                    
                </div>
               
            </div>
           <?php
            if(isset($_POST['admin_login'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = "select * from admin where username ='$username'and password='$password'";
                if(checkQuery($query)){
                    $_SESSION['admin_log'] = $username;
                    redirect ('index');
                    
                }
                else{
                    echo "fail";
                }
            }
            ?>
        </div>
    </body>
</html>