<?php
$connect = mysqli_connect('localhost','root','','movie');
function runQuery($query){
    global $connect;
    $run = mysqli_query($connect,$query);
    if($run){
        return true;
    }
    else{
        return false;
    }
}
function callingQuery($query){
    global $connect;
    $array = array();
    $data = mysqli_query($connect,$query);
    while($row = mysqli_fetch_array($data)){
        $array[] = $row;
    }
    return $array;
}
function checkQuery($query){
    global $connect;
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);
    if($count > 0){
        return true;
    }
    else{
        return false;
    }
}
function redirect($page){
    echo "<script>window.open('$page.php','_self')</script>";
}

