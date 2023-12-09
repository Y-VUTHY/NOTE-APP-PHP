<?php
include_once("../../inc/functions.php");
$userID = $_POST['userID'];
$data = updateCourse($_POST);
header("Location: ../../index.php?page=home&userID=$userID&search=");
