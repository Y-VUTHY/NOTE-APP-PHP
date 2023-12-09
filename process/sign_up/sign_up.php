<?php
  include_once("inc/functions.php");
  $password ="";
  $confirmPassword="";
  $messageWarning="";
  $firstName = "";
  $regex = "/^[a-zA-Z0-9\!@#$%&*()_+-=]+$/";
  if($_SERVER['REQUEST_METHOD'] =="POST"){
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm'];
    if(strlen($password)<7){
      $messageWarning = "You need to set your password at least more 8 characters";
    }elseif(preg_match($regex,  $password)){
      if($password !=$confirmPassword){
        $messageWarning = "Your password is not matched";
      }else{
        $userID  = SignUp($_POST);
        if($userID !=0){
          $userName = getUserName($userID);
          $_SESSION['userName'] = $userName;
          header("Location:index.php?page=home&userID=$userID&search=");
        }else{
          $messageWarning = "User already existed";
        }
      }
    }else{
      $messageWarning = "Password can follow only: a-z A-Z 0-9 ! # $ % & * () _ + -";
    }
  }
?>
<div class="container d-flex justify-content-center align-items-center vh-100">
  <form action="#" method="POST" class = "border border-primary rounded p-3 col-xs-6 col-sm-8 col-md-5 col-lg-5 col-xl-5">
    <div class="form-group">
      <img class="mx-auto d-block" src="assets/images/website_logo/pnc_logo.png" alt="logo" style="width:60px;height:60px;">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="usr" name="firstName" placeholder="First name" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="usr" name="lastName" placeholder="Last name" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="usr" name="email" placeholder="E-mail" required>
    </div>
    <div class="form-group d-flex">
      <input type="password" class="form-control mr-1" id="pwd" name="password" placeholder="Password" required>
      <input type="password" class="form-control ml-1" id="pwd" name="confirm" placeholder="confirm password" required>
    </div>
    <small class="text-danger"><?= $messageWarning;?></small>
    <div class="form-group">
      <a href="index.php?page=log_in" class="d-flex justify-content-end"><u>Log in</u></a>
    </div>
    <button type="submit" class="mx-auto d-block rounded btn btn-primary">Sign Up</button>
  </form>
</div>
