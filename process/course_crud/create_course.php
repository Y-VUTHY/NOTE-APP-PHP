<?php  
include_once("../../inc/functions.php");
$isAddNewCourse = createNewCourse($_POST);
$userID=$_POST['userID'];
if($isAddNewCourse){
    header("Location:../../index.php?page=home&userID=$userID&search=");
}