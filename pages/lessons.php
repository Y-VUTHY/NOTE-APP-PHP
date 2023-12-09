<?php 
    include_once("inc/functions.php");
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $userID = $_GET['userID'];
        $courseName = $_GET['courseName'];
        $courseID = $_GET['courseID'];
        $_SESSION["courseName"] = $courseName;
        $_SESSION["courseID"] =$courseID;
        $allLessons = getAllLessons($_GET);
    }elseif($_SERVER['REQUEST_METHOD']=='POST'){
        $allLessons = getAllLessons($_POST);
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary position-sticky sticky-top" style="z-index:90">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="assets/images/website_logo/pnc_logo.png" alt="logo" style="width:40px;height:40px;"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <h3 class="text-white"><?=$_SESSION['userName']?></h3>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="#" method = "POST">
        <input type="hidden" name="courseName" value = "<?=$_SESSION["courseName"]?>">
        <input type="hidden" name = "courseID" value = "<?=$_SESSION["courseID"]?>">
        <input type="hidden" name ="userID" value = "<?= $_SESSION["userID"]?>">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchLesson" aria-label="Search">
        <button class="btn btn-danger my-2 my-sm-0" type="submit" >Search</button>
        <!-- btn log out -->
        <a href="index.php?page=log_in"><button class="btn btn-warning my-2 my-sm-0 ml-2 text-white" type="button" name="log_out">Log out</button></a>
    </form>
    </div>
</nav>
<div id="lessonContainer" class="main_container w-100 overflow-auto" style="height:100vh;">
    <a href="index.php?page=home&userID=<?=$_SESSION['userID']?>&search="><button class="btn btn-danger m-3"><i class="fa fa-angle-double-left"></i>Back</button></a>
    <div class="p-3 mx-auto col-xs-9 col-sm-9 col-md-8 col-lg-6 col-xl-5">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                <?=$_SESSION["courseName"]?>
            </a>
            <?php foreach($allLessons as $lesson):;?>
            <div class="list-group-item list-group-item-action d-flex justify-content-around">
                <!-- lesson title -->
                <a href="index.php?page=noted&lessonName=<?=$lesson['title']?>&lessonID=<?=$lesson['lessonID']?>&courseID=<?=$_SESSION["courseID"]?>&courseName=<?=$_SESSION['courseName']?>&userID=<?=$_SESSION['userID']?>&isSubmit&searchNoted" style="width:30%" class="text-decoration-none text-dark overflow-hidden text-truncate"><?= $lesson['title']?></a>
                <!-- lesson date -->
                <a href="#" style="width:30%" class=" text-decoration-none text-dark"><?= $lesson['date']?></a>
                <div class="btnAction" style="width:10%">
                    <!-- btn edit lesson -->
                    <a href="process/lessons_crud/edit_lesson.php?courseName=<?=$_SESSION['courseName']?>&userID=<?=$_SESSION['userID']?>&courseID=<?=$_SESSION["courseID"]?>&lessonID=<?=$lesson['lessonID']?>" class='btnEditLesson fa fa-edit text-primary btnEdits text-decoration-none'></a>
                    <!-- btn delete lesson -->
                    <a href="process/lessons_crud/delete_lesson.php?userID=<?= $_SESSION['userID'];?>&courseID=<?= $_SESSION["courseID"];?>&courseName=<?= $_SESSION["courseName"];?>&lessonID=<?= $lesson['lessonID'];?>" class='fa fa-trash text-danger text-decoration-none'></a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div id="formCreateNewLesson">
            <form action="process/lessons_crud/create_lesson.php" method="POST" class="border border-primary rounded p-3 mt-3 bg-white">
                <input type="hidden" name = "userID" value = "<?= $_SESSION['userID'];?>">
                <input type="hidden" name = "courseID" value = "<?= $_SESSION["courseID"];?>">
                <input type="hidden" name = "courseName" value = "<?= $_SESSION["courseName"];?>">
                <div class="form-group">
                    <img class="mx-auto d-block" src="assets/images/lessonImg/lesson_logo.png" alt="logo" style="width:60px;height:60px;">
                </div>
                <div class="form-group">
                    <input id="lessonName" type="text" class="form-control" name="title" placeholder ="Lesson name" required>
                </div>
                <div class="form-group">
                    <input id="LessonDate" type="date" class="form-control" name="date" > 
                </div>
                <div class="form-group d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary" id="btnAddSubmitToAddLesson">Create</button>
                    <button class="btn btn-primary" id="btnToCancelToCreateNewLesson">Cancel</button>
                </div>
            </form>
        </div>
        <button id="btnAddNewLesson" class="btn btn-success">Add+</button>
    </div>
</div>