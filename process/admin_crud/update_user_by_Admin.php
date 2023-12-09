<?php 
    include_once("../../inc/functions.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $isUpdate = DisableUserByAdmin($_POST);
        if($isUpdate){
            header("Location:../../index.php?page=admin&password=$$%%vuthySeCure");
        }else{
            header("Location:../../index.php?page=404");
        }
    }