<?php
include_once("../../inc/functions.php");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    print_r($_GET);
    $lessonID = $_GET['lessonID'];
    $lessonName = $_GET['lessonName'];
    $courseID = $_GET["courseID"];
    $courseName = $_GET["courseName"];
    $userID =$_GET["userID"];
    $itemID = $_GET["itemID"];
    $isDelete = deleteNoteItem($itemID);
    if($isDelete){
        header("Location:../../index.php?page=noted&lessonID=$lessonID&lessonName=$lessonName&userID=$userID&courseID=$courseID&courseName=$courseName&isSubmit&searchNoted");
    }else{
        header("Location:../../index.php?page=404");
    }
}