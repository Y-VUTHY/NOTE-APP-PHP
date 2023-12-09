
<?php 
  include_once("inc/functions.php");
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $userID = $_GET['userID'];
    $_SESSION['userID'] = $userID;
    $allCourses = getCourseData($_GET);
  }
  elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    $allCourses = getCourseData($_POST);
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
    <form class="form-inline my-2 my-lg-0" action="#" method="post">
        <input type="hidden" name="userID" value="<?=$_SESSION['userID']?>">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
        <!-- btn log out -->
        <a href="index.php?page=log_in"><button class="btn btn-warning my-2 my-sm-0 ml-2 text-white" type="button" name="log_out">Log out</button></a>
    </form>
    </div>
</nav>
<div class="main_container w-100">
  <div class="mx-auto w-75">
    <div id="courseContainer" class="list-group mt-1 mb-1  ">
      <?php foreach ($allCourses as $course):;?>
      <div class="list-group-item list-group-item-action d-flex justify-content-around">
        <!-- link to lessons.php -->
        <div class="w-50 overflow-hidden text-truncate p-1">
          <a class="courses​​​​​" href="index.php?page=lessons&userID=<?=$_SESSION['userID'];?>&courseID=<?=$course['courseID']?>&courseName=<?= $course['title'];?>&searchLesson="><?= $course['title'];?></a>
        </div>
        <!-- date -->
        <div class="w-25 d-flex justify-content-end p-1">
          <a href="#"><?= $course['date'];?></a>
        </div>
        <div class="btnAction w-25 d-flex justify-content-end p-1">
          <a href="process/course_crud/edit_course.php?userID=<?=$_SESSION['userID'];?>&courseID=<?=$course['courseID']?>" class='fa fa-edit text-primary btnEdits m-1'></a>
          <a href="process/course_crud/delete_course.php?userID=<?=$_SESSION['userID'];?>&courseID=<?=$course['courseID']?>" class='fa fa-trash text-danger m-1'></a>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    <div id="formAddCourse" class="w-100 rounded border border-primary p-3 col-xm-12 col-sm-10 col-md-7 col-lg-5">
      <form id="signInForm" action="process/course_crud/create_course.php" method="POST">
        <input type="hidden" name="userID" value='<?=$_SESSION['userID'];?>'>
        <div class="form-group">
          <input type="text" class="form-control"  name="title" placeholder="course" required id="courseTitle" $value="$_GET['title']">
        </div>
        <div class="form-group">
          <input type="date" class="form-control" name="date" required id="courseDate" $value="$_GET['date']">
        </div>
        <div class="form-group d-flex justify-content-around">
          <button type="submit" id="btnSubmitToAddCourse" class="btn btn-primary">Submit</button>
          <button type="reset" id ="btnCancelToAddCourse" class="btn btn-primary">Cancel</button>
        </div>
      </form>
    </div>
    <button class="btn btn-primary" name="addCourse" id="btnAddCourse">add+</button>
  </div>
</div>