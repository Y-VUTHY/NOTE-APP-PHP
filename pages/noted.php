
<?php 
    include_once("inc/functions.php");
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $lessonID = $_GET['lessonID'];
        $lessonName = $_GET['lessonName'];

        $courseID = $_GET['courseID'];
        $courseName = $_GET['courseName'];
        $userID = $_GET['userID'];

        $_SESSION['lessonID'] = $lessonID;
        $_SESSION['lessonName'] = $lessonName;

        $noteDatas = getAllNoted($_GET);
        $isSubmit = $_GET['isSubmit'];
    }elseif($_SERVER['REQUEST_METHOD']=='POST'){
        $noteDatas = getAllNoted($_POST);
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
        <input type="hidden" name="lessonID" value ="<?=$_SESSION['lessonID']?>">
        <input type="hidden" name = "lessonName" value ="<?=$_SESSION['lessonName']?>">
        <input class="form-control mr-sm-2" type="search" name="searchNoted" placeholder="Search" aria-label="Search">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
        <!-- btn log out -->
        <a href="index.php?page=log_in"><button class="btn btn-warning my-2 my-sm-0 ml-2 text-white" type="button" name="log_out">Log out</button></a>
    </form>
    </div>
</nav>
<div class="w-100"  id="note_main_contianer">
    <!-- back to lesson -->
    <div class="d-flex flex-column">
        <a style="width:10%" href="index.php?page=lessons&courseID=<?=$_SESSION['courseID']?>&courseName=<?=$_SESSION['courseName']?>&userID=<?=$_SESSION['userID']?>&lessonName=<?=$_SESSION['lessonName']?>&lessonID=<?=$_SESSION['lessonID']?>&searchLesson"><button class="btn btn-danger m-1">Back</button></a>
    </div>
    <!-- Note Area -->
    <div class="w-50 mx-auto mb-2">
        <h1 class="text-break"><?=$_SESSION['lessonName']?></h1>
        <hr>
        <div class="">
            <?php foreach($noteDatas as $data):;?>
                <?php if(!empty($data['description'])):;?>
                    <div class="d-flex justify-content-between">
                        <p class="text-break"><?=$data['description']?></p>
                        <div class="btnAction">
                            <!-- btn edit text -->
                            <a href="process/note_crud/edit_text_form.php?itemID=<?=$data['itemID']?>&lessonID=<?= $_SESSION['lessonID']?>&lessonName=<?=$_SESSION['lessonName']?>&userID=<?=$_SESSION['userID']?>&courseID=<?=$_SESSION['courseID']?>&courseName=<?=$_SESSION['courseName']?>" class='btnEditLesson fa fa-edit text-dark btnEdits text-decoration-none'></a>
                            <!-- btn delete text -->
                            <a href="process/note_crud/delete_text_note.php?itemID=<?=$data['itemID']?>&lessonID=<?= $_SESSION['lessonID']?>&lessonName=<?=$_SESSION['lessonName']?>&userID=<?=$_SESSION['userID']?>&courseID=<?=$_SESSION['courseID']?>&courseName=<?=$_SESSION['courseName']?>" class='fa fa-trash text-dark text-decoration-none'></a>
                        </div>
                    </div>
                <?php else:;?>
                    <div class="border border-primary p-1 rounded">
                        <img style="width:100%;height:30vw" src="assets/images/note_images/<?=$data['image']?>" alt="image">
                        <div class="btnAction" ">
                            <!-- btn delete img -->
                            <a style="font-size:20px" href="process/note_crud/delete_img.php?itemID=<?=$data['itemID']?>&lessonID=<?= $_SESSION['lessonID']?>&lessonName=<?=$_SESSION['lessonName']?>&userID=<?=$_SESSION['userID']?>&courseID=<?=$_SESSION['courseID']?>&courseName=<?=$_SESSION['courseName']?>" class='fa fa-trash text-dark text-decoration-none'></a>
                        </div>
                    </div>
                    <br>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
    <!-- note Option -->
    <div class="w-50 mx-auto mb-5">
        <a id="btnTakeNote" style="width:10%" href="#"><button class = "btn btn-primary">+</button></a>
        <a id="btnCloseNote" style="width:10%" href="#"><button class = "btn btn-primary m-1">X</button></a>
        <div id='noteOption' class="noteOption border border-primary rounded p-3">
            <!-- add image -->
            <form action="process/note_crud/uploadImage.php" class="d-flex flex-column mb-3" method="post" enctype="multipart/form-data">
                    <input type="hidden" name = "courseID" value = "<?=$_SESSION['courseID']?>">
                    <input type="hidden" name = "courseName" value= "<?=$_SESSION['courseName']?>">
                    <input type="hidden" name = "userID" value="<?=$_SESSION['userID']?>">
                    <input type="hidden" name="lessonID" value="<?=$_SESSION['lessonID']?>">
                    <input type="hidden" name="lessonName" value="<?=$_SESSION['lessonName']?>">
                    <p class='text-danger'>Upload Image <i class="fa fa-arrow-circle-down"></i></p>
                    <input class="mb-2" type="file" name="image" required>
                    <div>
                        <button class="btn btn-primary" type="submit">upload</button>
                    </div>
            </form>
            <!--button add text -->
            <div class="d-flex align-items-start">
                <button class="btn btn-primary" id="btnInputText">+</button>
                <p class="m-2">Write Something!</p>
            </div>
        </div>
        <!-- input text  -->
        <div id="noteInputText" class = "border border-primary rounded p-3">
            <form action="process/note_crud/addTextToNotePage.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name = "courseID" value = "<?=$_SESSION['courseID']?>">
                <input type="hidden" name = "courseName" value= "<?=$_SESSION['courseName']?>">
                <input type="hidden" name = "userID" value="<?=$_SESSION['userID']?>">
                <input type="hidden" name="lessonID" value="<?=$_SESSION['lessonID']?>">
                <input type="hidden" name="lessonName" value="<?=$_SESSION['lessonName']?>">
                <div class="form-group">
                    <label class="text-primary">Input text</label>
                    <input type="text" name="description" class="form-control" placeholder="What do you want to note?" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <input id="checkSubmit" type="hidden" value="<?=$isSubmit?>">
    <button id="btnGoToTheTop" class="d-flex justify-content-end m-3 position-fixed btn btn-primary" style="bottom:0;right:0">
        <i class="fa fa-arrow-circle-up"></i>
    </button>
</div>