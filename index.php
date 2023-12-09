<?php
session_start();
include_once("partial/header.php");
if(isset($_GET['page'])){
    if($_GET['page'] == 'log_in'){
        include_once("process/log_in/log_in.php");
    }elseif($_GET['page'] == 'sign_up'){
        include_once("process/sign_up/sign_up.php");
    }elseif($_GET['page'] == 'home'){
        include_once("pages/home.php");
    }elseif($_GET['page'] =='lessons'){
        include_once("pages/lessons.php");
    }elseif($_GET['page'] == 'noted'){
        include_once("pages/noted.php");
    }elseif($_GET['page']=='admin' and $_GET['passowrd']='1234567'){
        include_once("pages/admin.php");
    }
    else{
        include_once("pages/404.php");
    }
}else{
    include_once("process/log_in/log_in.php");   
}

include_once("partial/footer.php");