<?php 
include_once("../../inc/functions.php");
$courseID=$_GET['courseID'];
$userID = $_GET['userID'];
$isDeletedCourse = deleteCourse($courseID);
if($isDeletedCourse){
    header("Location: ../../index.php?page=home&userID=$userID&search=");
}else{
    header("Location:../../index.php?page=404");
}