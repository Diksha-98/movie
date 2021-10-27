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
       
        
    </head>
    <body>
         <?php include "navbar.php";?>
         
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3">
           <?php include "side.php";?>
                </div>
                <div class="col-lg-9">
                  
                    
                   <form action="insertbiz.php" method="post" enctype="multipart/form-data">
                       <div class="mb-3">
                           <label class="text-white">title</label>
                           <input type="text" name="title" class="form-control">
                           
                       </div>
                        <div class="mb-3">
                           <label class="text-white">category</label>
                           <select name="category" class="form-control">
                                 <?php
                           $cat_calling = callingQuery("select * from category");
                          foreach($cat_calling as $cat):
                               ?>
                               <option value="<?=$cat['id'];?>"><?=$cat['cat_title'];?></option>
                               <?php endforeach;?>
                                       
                           </select>
                       </div>
                       
                        
                  
                       <div class="mb-3">
                           <label class="text-white">description</label>
                           <textarea rows="5" name="description" class="form-control"></textarea>
                           
                       </div>
                       
                       
                        <div class="mb-3 ">
                           <label class="text-white">name</label>
                           <input type="text" name="name" class="form-control">
                           
                       </div>
                       <div class="mb-3">
                           <label class="text-white">director</label>
                           <input type="text" name="director" class="form-control">
                          
                       </div>
                      
                        <div class="mb-3">
                           <label class="text-white">writer</label>
                           <input type="text" name="writer" class="form-control">
                            
                       </div>
                       
    
                        
                      
                        <div class="mb-3">
                           <label class="text-white">star</label>
                           <input type="text" name="star" class="form-control">
                             
                       </div>
                        <div class="mb-3">
                           <label class="text-white">singer</label>
                           <input type="text" name="singer" class="form-control">
                            
                       </div>
                        
        
                      
                       <div class="row">
                   
                        <div class="mb-3 col-6">
                           <label class="text-white">image1</label>
                           <input type="file" name="image1" class="form-control">
                       </div>
                       <div class="mb-3 col-6">
                           <label class="text-white">image2</label>
                           <input type="file" name="image2" class="form-control">
                       </div>
                       </div>
                       <div class="mb-3">
                          
                           <input type="submit" class="btn btn-success btn-block" name="insert">
                       </div>
                    
                  
                       
                       
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php

            if(isset($_POST['insert'])){
                $title = $_POST['title'];
                $category = $_POST['category'];
                $description = $_POST['description'];
                $name = $_POST['name'];
                $director= $_POST['director'];
                $writer= $_POST['writer'];
                $star= $_POST['star'];
                $singer= $_POST['singer'];
                
             
         
      $image1 = $_FILES['image1']['name'];
      $image2 = $_FILES['image2']['name'];
                    
$tmp_image1 = $_FILES['image1']['tmp_name'];
   $tmp_image2 = $_FILES['image2']['tmp_name'];            
                    
move_uploaded_file($tmp_image1,"../image1/$image1");   move_uploaded_file($tmp_image2,"../image1/$image2");
   
     

                $query = "INSERT INTO records(title,category,description,name,director,writer,star,singer,image1,image2)value('$title','$category','$description','$name','$director','$writer','$star','$singer','$image1','$image2')";
                
                if(runQuery($query)){
                
                    
                    redirect('biz');
                }
                    
                else{
                    echo "false";
                }
            }
                
            
           ?>
                    
                    
                    
                    
  

              
            
            