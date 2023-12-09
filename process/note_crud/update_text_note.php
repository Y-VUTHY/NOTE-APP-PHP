<?php
include_once("../../inc/functions.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
    $courseID = $_POST['courseID'];
    $courseName = $_POST['courseName'];
    $lessonID = $_POST['lessonID'];
    $lessonName = $_POST['lessonName'];
    $userID = $_POST['userID'];
    $itemID = $_POST['itemID'];
    $isUpdateText = updateText($_POST);
    print_r(gettype($isUpdateText));
    if($isUpdateText){
        header("Location:../../index.php?page=noted&lessonID=$lessonID&lessonName=$lessonName&userID=$userID&courseID=$courseID&courseName=$courseName&isSubmit&searchNoted");
    }else{
        header("Location:../../index.php?page=404");
    }
}