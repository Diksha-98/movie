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
    <body>
         <?php include "include/navbar.php";?>
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
                        <a href="" class="list-group-item list-group-action"><?=$data['cat_title'];?></a>
                        <?php endforeach;?>
                    </div>
           
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                        if(isset($_GET['biz_id'])){
                            $id = $_GET['biz_id'];
                        
                        $calling = callingQuery("SELECT * FROM records JOIN category ON records.category = category.id WHERE records.m_id='$id'");
                       foreach($calling as $data);
                    
                        ?>
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <h4 class="text-uppercase font-weight-border"><? $data['title'];?></h4>
                            </div>
                    </div>
                        <div class="card bg-light mb-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="image1/<?= $data['image1'];?>" width="100%" style="object-fit:contain;height:230px;">
                                </div>
                                <div class="col-lg-8">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>category</td>
                                            <td><?= $data['cat_title'];?></td>
                                        </tr>
                                         <tr>
                                            <td>name</td>
                                            <td><?= $data['name'];?></td>
                                        </tr>
                                        <tr>
                                            <td>director</td>
                                            <td><?= $data['director'];?></td>
                                        </tr>
                                        <tr>
                                            <td>writer</td>
                                            <td><?= $data['writer'];?></td>
                                        </tr>
                                        <tr>
                                            <td>star</td>
                                            <td><?= $data['star'];?></td>
                                        </tr>
                                        <tr>
                                            <td>singer</td>
                                            <td><?= $data['singer'];?></td>
                                        </tr>
                                         
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-white">description</div>
                                        <div class="card-body">
                                            <p class="small text-justify"><?= $data['description'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                </div>
           <?php } ?>
                                            
            
            </div>
        </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Related movie</h2>
            </div>
            <?php
            $id = $_GET['biz_id'];
            $calling = callingQuery("SELECT * FROM records JOIN category ON records.category= category.id WHERE records.m_id != '$id'");
            foreach($calling as $data):
            ?>
            <div class="col-lg-12">
                <div class="card mb-2 bg-light">
                    <div class="row">
                        <div class="col-lg-5">
                            <img src="image1/<?= $data['image1'];?>" width="100%" style="object-fit:contain;height:230px;">
                            
                        </div>
                        <div class="col-lg-4">
                            <div class="card-body">
                                <h4 class="text-uppercase font-weight-border"><? $data['title'];?></h4>
                                <span class="badge bg-primary"><? $data['cat_title'];?></span>
                             <p class="small text-justify"><?= substr($data['description'],0,150);?></p>
                                
                                <div class="clear-fix">
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
    </body>
</html>