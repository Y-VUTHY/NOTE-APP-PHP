<?php
    include_once("inc/functions.php");
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $AllUserData = getAllUserData();
    }
    elseif($_SERVER['REQUEST_METHOD']=='POST'){
        $AllUserData = searchUser($_POST);
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
            <h3 class="text-white">Vuthy Yib (Administrator)</h3>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="#" method="post">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="User Email" aria-label="Search">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
        <!-- btn log out -->
        <a href="index.php?page=log_in"><button class="btn btn-warning my-2 my-sm-0 ml-2 text-white" type="button" name="log_out">Log out</button></a>
    </form>
    </div>
</nav>
<div class="p-3">
    <div class="list-group bg-primary p-3 text-white font-weight-bold">
        
        All users DATA:
      
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>

            </tr>
        </thead>
        <tbody>
        <?php
            foreach($AllUserData as $data):;
        ?>
            <tr>
                <th ><?=$data['userID']?></th>
                <td class="text-break"><?=$data['firstName']?></td>
                <td class="text-break"><?=$data['lastName']?></td>
                <td class="text-break"><?=$data['email']?></td>
                <!-- button delete user -->
                <td><a class="p-1 bg-danger rounded text-white" href="process/admin_crud/delete_user_by_admin.php?userID=<?=$data['userID']?>">Delete</a></td>
                <!-- button edit user -->
                <td><a class="p-1 bg-primary rounded text-white" href="process/admin_crud/edit_user_by_admin.php?userID=<?=$data['userID']?>">Edit</a></td>
            </tr>
        <?php
            endforeach;
        ?>
        </tbody>
    </table>
</div>
