
<?php
  include_once("inc/functions.php");
  $password ="";
  $messageWarning="";
  if($_SERVER['REQUEST_METHOD'] =="POST"){
    $password = $_POST['password'];
    $userID = verifyUserLogin($_POST);
    if($userID !=0){
      $userName = getUserName($userID);
      $_SESSION['userName'] = $userName;
      header("Location:index.php?page=home&userID=$userID&search=");
    }else{
      $messageWarning = "User doesn't exist; Please check your Email or password again";
    }
    
  }
?>
<div class="container d-flex justify-content-center align-items-center vh-100" >
  <form id="signInForm" action="#" method="POST" class = "border border-primary rounded p-3 col-xs-6 col-sm-8 col-md-5 col-lg-5 col-xl-5">
    <div class="form-group">
      <img class="mx-auto d-block" src="assets/images/website_logo/pnc_logo.png" alt="logo" style="width:60px;height:60px;">
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="usr" name="email" placeholder="E-mail" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd" name="password" placeholder="Password" required>
      <small class="text-danger"><?= $messageWarning ;?></small>
    </div>
    <div class="form-group">
      <a href="index.php?page=sign_up" class="d-flex justify-content-end"><u>Sign Up</u></a>
    </div>
    <button type="submit" class="mx-auto d-block rounded btn btn-primary">Log in</button>
  </form>
</div>


