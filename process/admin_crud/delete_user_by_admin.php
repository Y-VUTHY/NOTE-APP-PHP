<?php 
include_once("../../inc/functions.php");
if($_SERVER['REQUEST_METHOD']=='GET'){
    $userID = $_GET['userID'];
    $isDelete = deleteUserbyAdmin($userID);
    if($isDelete){
        header("Location:../../index.php?page=admin&password=$$%%vuthySeCure");
    }else{
        header("Location:../../index.php?page=404");
    }
}