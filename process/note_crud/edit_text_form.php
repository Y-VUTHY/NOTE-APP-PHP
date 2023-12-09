<?php 
    include_once("../../inc/functions.php");
    include_once("../../partial/header.php");
    if($_SERVER['REQUEST_METHOD']=="GET"){
        $courseID = $_GET['courseID'];
        $courseName = $_GET['courseName'];
        $lessonID = $_GET['lessonID'];
        $lessonName = $_GET['lessonName'];
        $userID = $_GET['userID'];
        $itemID = $_GET['itemID'];
        $getTextToUpdate = getTextToUpdate($itemID);
    }
    foreach($getTextToUpdate as $data):;
?>
<div class="d-flex justify-content-center align-items-center w-100" style="height:80vh">
    <div id="noteInputText" class = "w-50" >
        <a href="../../index.php?page=noted&lessonID=<?= $lessonID?>&lessonName=<?=$lessonName?>&userID=<?=$userID?>&courseID=<?=$courseID?>&courseName=<?=$courseName?>&isSubmit=&searchNoted"><button class="btn btn-primary">Back</button></a>
        <form class="border border-primary rounded  mt-1 p-3" action="update_text_note.php" method="POST">
            <input type="hidden" name = "courseID" value = "<?=$courseID?>">
            <input type="hidden" name = "courseName" value= "<?=$courseName?>">
            <input type="hidden" name = "userID" value="<?=$userID?>">
            <input type="hidden" name="lessonID" value="<?=$lessonID?>">
            <input type="hidden" name="lessonName" value="<?=$lessonName?>">
            <input type="hidden" name="itemID" value="<?=$itemID?>">
            <div class="form-group">
                <label class="text-primary">Input text</label>
                <input type="text" name="description" class="form-control" value ="<?=$data['description']?>"  required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<?php 
    endforeach;
    include_once("../../partial/footer.php");
?>