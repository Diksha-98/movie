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
                <div class="col-lg-9 shadow">
                    <table class=" table table-striped">
                        <tr>
                            <th>m_id</th>
                            <th>title</th>
                            <th>name</th>
                            <th>director</th>
                            <th>action</th>
                        </tr>
                        <?php
                        $biz_calling = callingQuery("select * from records");
                        foreach($biz_calling as $biz):
                        ?>
                        <tr>
                            <td><?= $biz['m_id'];?></td>
                            <td><?= $biz['title'];?></td>
                            <td><?= $biz['name'];?></td>
                            <td><?= $biz['director'];?></td>
                        
                            
                              
                            <td>
                                <a href="" class="btn btn-info btn-sm">edit</a>
                                <a href="" class="btn btn-success btn-sm">view</a>
                                <a href="delete_biz.php?delete_biz=<?= $biz['m_id'];?>" class="btn btn-danger btn-sm">Delete</a>
                                
                                
                            
                              
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>