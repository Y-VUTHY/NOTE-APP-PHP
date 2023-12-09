<?php 
include_once("../../inc/functions.php");
$isCreate = createNewLesson($_POST);
$courseID=$_POST["courseID"];
$courseName = $_POST["courseName"];
$userID = $_POST['userID'];
if($isCreate){
    header("Location:../../index.php?page=lessons&userID=$userID&courseName=$courseName&courseID=$courseID&searchLesson");
}else{
    header("Location:../../index.php?page=404");
}