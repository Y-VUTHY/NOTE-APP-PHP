<?php 
    $userID = $_GET['userID'];
    $courseName = $_GET['courseName'];
    $courseID = $_GET['courseID'];
    $lessonID = $_GET['lessonID'];
    include_once("../../inc/functions.php");
    include_once("../../partial/header.php");
    $ALessonToUpdate = getALesson($lessonID);
    foreach($ALessonToUpdate as $data):;
?>
<div id="lessonContainer" class="main_container w-100" style="height:100vh;">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary position-sticky sticky-top" style="z-index:99">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="../../assets/images/website_logo/pnc_logo.png" alt="logo" style="width:40px;height:40px;"></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
            <h3 class="text-white">Vuthy</h3>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger my-2 my-sm-0" type="submit" name="search">Search</button>
            <!-- btn log out -->
            <a href="../../index.php?page=log_in"><button class="btn btn-warning my-2 my-sm-0 ml-2 text-white" type="button" name="log_out">Log out</button></a>
        </form>
        </div>
    </nav>
    <div class="p-3 mx-auto col-xs-9 col-sm-9 col-md-8 col-lg-6 col-xl-5">
        <a href="../../index.php?page=lessons&courseName=<?=$courseName?>&userID=<?=$userID?>&courseID=<?=$courseID?>&searchLesson"><button class="btn btn-danger mb-2"><i class="fa fa-angle-double-left"></i>Back</button></a>
        <div>
            <form action="update_lesson.php" method="POST" class="border border-primary rounded p-3 mt-3 bg-white">
                <input type="hidden" name = "userID" value = "<?= $userID;?>">
                <input type="hidden" name = "courseID" value = "<?= $courseID;?>">
                <input type="hidden" name = "courseName" value = "<?= $courseName;?>">
                <input type="hidden" name ="lessonID" value ="<?= $data['lessonID']?>">
                <div class="form-group">
                    <img class="mx-auto d-block" src="../../assets/images/lessonImg/lesson_logo.png" alt="logo" style="width:60px;height:60px;">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="title" value="<?=$data['title']?>">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" name="date" value="<?=$data['date']?>"> 
                </div>
                <div class="form-group d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary" id="btnAddSubmitToAddLesson">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    endforeach;
    include_once("../../partial/footer.php");
?>