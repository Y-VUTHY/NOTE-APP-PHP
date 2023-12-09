<?php 
include_once("../../inc/functions.php");
$courseID=$_GET["courseID"];
$courseName = $_GET["courseName"];
$userID = $_GET['userID'];
$lessonID = $_GET['lessonID'];
$isDelete = deleteLession($lessonID);
if($isDelete){
    header("Location: ../../index.php?page=lessons&userID=$userID&courseName=$courseName&courseID=$courseID&searchLesson");
}else{
    header("Location: ../../index.php?page=404");
}