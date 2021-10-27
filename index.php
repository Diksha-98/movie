<?php require_once("include/connect.php");
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
    <body class="bg-danger">
        <?php include "include/navbar.php";?>
        <h2 class="text-danger text-center font-bold">WELCOME TO WORLD OF MOVIES</h2>
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
                        <a href="" class="list-group-item list-group-action active">category</a>
                        <?php
                        $result = callingQuery("select * from category");
                        foreach($result as $data):
                        ?>
                        <a href="category.php?cat=<?= $data['id'];?>" class="list-group-item list-group-action"><?=$data['cat_title'];?></a>
                        <?php endforeach;?>
                    </div>
                   <div class="card mt-5">
                       <img src="th%20(3).jfif" width="100%">
                       
                    </div>
                    <div class="card mt-5">
                      <img src="220px-Heropanti_Poster.jpg" width="100%">
                       
                    </div>
                    <div class="card mt-5">
                      <img src="Love_Aaj_Kal_2.jpg" width="100%">
                       
                    </div>
           
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        
                        <?php
                        if(isset($_GET['find'])){
                            $search = $_GET['search'];
                            $calling = callingQuery("SELECT * FROM records JOIN category ON records.category =category.id WHERE records.title LIKE '%$search%'");
                            
                        }
                        else{
                            $calling = callingQuery("SELECT * FROM records JOIN category ON records.category =category.id");
                            
                        }
                      
                       foreach($calling as $data):
                        ?>
                        <div class="col-lg-12">
                            <div class="card bg-light mb-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="image1/<?= $data['image1'];?>" class="w-100" style="object-fit: cover;height:240px;"> 
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                    <h5 class="text-uppercase text-truncate"><?= $data['title'];?></h5>
                                            
                                    <span class="badge bg-primary"><?= $data['cat_title'];?></span>
                                            
                                    <p class="small text-justify"><?= $data['description'];?></p>        
                                            
    
                                 
                                    
                                            
                                           
                                            <div class="clearfix">
                                                <a href="biz.php?biz_id=<?=$data ['m_id'];?>" class="btn btn-danger float-right">view more</a>
                                                
                                            </div>
                                </div>
                                        
                                    </div>
                            </div>
                            
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                </div>
            </div>
</div>
    </body>
</html>
    
    

        

