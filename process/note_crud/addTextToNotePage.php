<?php
include_once("../../inc/functions.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isAddNewNoteText = addNewNoteText($_POST);
    $lessonID = $_POST['lessonID'];
    $lessonName = $_POST['lessonName'];
    $courseID = $_POST['courseID'];
    $courseName = $_POST['courseName'];
    $userID = $_POST['userID'];
    if($isAddNewNoteText){
        header("Location:../../index.php?page=noted&lessonID=$lessonID&lessonName=$lessonName&userID=$userID&courseID=$courseID&courseName=$courseName&isSubmit='true'&searchNoted");
    }else{
        header("Location:../../index.php?page=404");
    }
}