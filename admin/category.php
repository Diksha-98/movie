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
        
    </head>
    <body>
         <?php include "navbar.php";?>
      <div class="container mt-5">
          <div class="row">
               <div class="col-lg-3">
                   <?php include "side.php";?>
                    
                </div>
              <div class="col-lg-9">
                  <div class="row">
                      <div class="col-lg-8">
                          <table class="table table-striped">
                              <tr>
                                  <th>id</th>
                                  <th >cat_title</th>
                                  <th>cat_description</th>
                                  <th>action</th>
                              </tr>
                                  <?php
                                  $cat_calling = callingQuery("select * from category");
                                  foreach($cat_calling as $cat):
                                  ?>
                              <tr>
                                 <td><?=$cat['id'];?></td>
                                 <td><?=$cat['cat_title'];?></td>
                                 <td><?=$cat['cat_description'];?></td>
                                  <td>
                                      <a href="" class="btn btn-info btn-sm">edit</a>
                                      <a href="category_delete.php?delete_cat=<?= $cat['id'];?> " class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                              </tr>
                              <?php endforeach; ?>
                          
                          </table>
                      </div>
                      <div class="col-lg-4">
                          <form action="category.php" method="post">
                              <div class="mb-3">
                                  <label>category_title</label>
                                  <input type="text" class="form-control" name="cat_title">
                                  
                              </div>
                               <div class="mb-3">
                                  <label>category_description</label>
                                  <textarea rows="5" class="form-control" name="cat_description"></textarea>
                                  
                              </div>
                              <div class="mb-3">
           
                                  <input type="submit" class="btn btn-success btn-block" name="insert">
                                  
                              </div>
                          </form>
                          <?php
                          if(isset($_POST['insert'])){
                              $cat_title = $_POST['cat_title'];
                              $cat_description = $_POST['cat_description'];
                              $query = "INSERT INTO category(cat_title,cat_description)value('$cat_title','$cat_description')";
                              if(runQuery($query)){
                                  redirect('category');
                                  
                              }
                              else{
                                  echo "false";
                              }
                          }
                          ?>
                      </div>
                  </div>
                  
              </div>
                    
          </div>
          
        </div>
    </body>
</html>