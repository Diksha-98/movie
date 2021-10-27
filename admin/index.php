<?php require_once("../include/connect.php");
session_start();
if(!isset($_SESSION['admin_log'])){
    redirect ('login');
}
?>



<html>
    <head>
        <title>movie</title>
       <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
    <a href="index.php" class="navbar-brand">admin panel</a>
    <ul class="navbar-nav ml-auto">
        
        <?php
        if(isset($_SESSION['admin_log'])): ?>
        
         <li class="nav-item">
            <a href="logout.php" class="btn btn-danger">logout</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a href="login.php" class="btn btn-primary">login</a>
        </li>
        <?php endif; ?>
        
        
        
        
    </ul>
    </div>
</div>
       
        <div class="container mt-5">
            <div class="card">
            <div class="carousel-slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="Dil_Bechara_film_poster.jpg" width="100%" height="250px">
                        
                    </div>
                    <div class="carousel-item ">
                        <img src="Love_Aaj_Kal_2.jpg" width="100%" height="250px">
                        
                    </div>
                          <div class="carousel-item ">
                        <img src="220px-Heropanti_Poster.jpg" width="100%" height="250px">
                        
                    </div>
                   
                </div>
            </div>
        </div>
        </div>
      
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action active">dashboard</a>
                        <a href="" class="list-group-item list-group-item-action ">movie record</a>
                        <a href="" class="list-group-item list-group-item-action ">categories</a>
                          
                        
                    </div>
                </div>
                    
               
                <div class="col-lg-9">
                    <div class="bg-light text-dark shadow p-5 rounded bg-white">
                        <ul class="mb-4">WELCOME TO MOVIE WEBSITE </ul>
                        <a href="insertbiz.php" class="btn btn-danger btn-lg">insert movie record</a>
                        <a href="category.php" class="btn btn-warning btn-lg">insert categories</a>
                        
                    </div>
                </div>
               
                
            </div>
        </div>
    </body>
</html>