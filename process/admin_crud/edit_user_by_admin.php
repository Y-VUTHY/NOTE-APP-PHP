<?php 
    include_once("../../partial/header.php");
    include_once("../../inc/functions.php");
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $userID = $_GET['userID'];
        $userData = GetUserByAdmin($userID);
    }
    foreach ($userData as $data):;
?>

<div class=" d-flex justify-content-center bg-primary align-items-center flex-column vh-100 p-3" >
    <div class = "col-xs-6 col-sm-8 col-md-5 col-lg-5 col-xl-5">
        <a href="../../index.php?page=admin&password=$$%%vuthySeCure"><button class="btn btn-light"><i class="fa fa-angle-double-left"></i> Back</button></a>
        <form action="update_user_by_Admin.php" method="POST" class="border border-primary rounded p-3 mt-3 bg-white">
            <input type="hidden" name="userID" value ="<?=$data['userID']?>">
            <div class="form-group">
                <img class="mx-auto d-block" src="../../assets/images/courseImg/courseIcon.png" alt="logo" style="width:60px;height:60px;">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" value="<?=$data['email'];?>">
            </div>
            <div class="form-group d-flex justify-content-around">
                <button type="submit" class="mx-auto d-block rounded btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<?php 
    endforeach;
    include_once("../../partial/footer.php");
?>