<?php
include_once("../../inc/functions.php");
$courseID = $_POST['courseID'];
$courseName = $_POST['courseName'];
$userID = $_POST['userID'];
$isUpdated = updateALesson($_POST);

if($isUpdated){
    header("Location:../../index.php?page=lessons&courseName=$courseName&userID=$userID&courseID=$courseID&searchLesson");
}else{
    header("Location:../../index.php?page=404");
}