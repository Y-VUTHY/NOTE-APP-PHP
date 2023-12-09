<?php 
// link to database
include_once("database.php");
// verify data to sign in 
function verifyUserLogin($data){
    $userID =0;
    $email = $data['email'];
    $password = $data['password'];
    $object = database()->query("SELECT * FROM user WHERE email = '$email'");
    foreach ($object as $row){
        if($row['email']==$email and password_verify($password, $row['password'])){
          $userID = $row['userID'];
        }
    }return ($userID);
}
// search item 
function getCourseData($data){
    $search = $data['search'];
    $userID = $data['userID'];
    return database()->query("SELECT * FROM courses WHERE userID = '$userID' and title like '%$search%'");
}
// get userName 
function getUserName($userID){
    $userName ="";
    $userData = database()->query("SELECT * FROM user WHERE userID ='$userID'");
    foreach($userData as $data){
        $userName = $data['firstName']." ".$data['lastName'];
    }
    return $userName;
}
// Sign up new user account, and check user already existed or not
function SignUp($data){
    $isCanSignUp = true;
    $userID = 0;
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $email = $data['email'];
    $password = $data['password'];
    $passEncrypt = password_hash($password, PASSWORD_DEFAULT);
    $AllEmails = database()->query("SELECT * FROM user WHERE email = '$email' ");
    foreach ($AllEmails as $emails){
        if($emails['email'] == $email){
            $isCanSignUp = false;
        }
    }
    if($isCanSignUp){
        database()->query("INSERT INTO user(firstName,lastName,email,password)
        VALUES('$firstName','$lastName','$email','$passEncrypt')");
        $datas = database() ->query("SELECT userID FROM user WHERE email ='$email' AND password = '$passEncrypt'");
        foreach ($datas as $data){
            $userID = $data['userID'];
        }
    }return $userID;
}

//-------------------CRUD Courses-------------//
//Create new course 
function createNewCourse($data){
    $title = $data["title"];
    $date = $data["date"];
    $userID = $data["userID"];
    return database()->query("INSERT INTO courses(title,date,userID)VALUES('$title','$date','$userID')");
}
//Delete Course 
function deleteCourse($courseID){
    return database()->query("DELETE FROM courses WHERE courseID = '$courseID'");
}
//Get a course to edit 
function getACourse($courseID){
    return database()->query("SELECT * FROM courses WHERE courseID = '$courseID'");
}
// Update a course name or date 
function updateCourse($data){
    $courseID = $data['courseID'];
    $title = $data['title'];
    $date = $data['date'];
    return database()->query("UPDATE courses SET title='$title',date='$date' WHERE courseID ='$courseID' ");
}
//-------------------CRUD Courses-------------//
//-------------------CRUD Lessons-------------//
//Display all lessons
function getAllLessons($data){
    $courseID = $data['courseID'];
    $searchLesson = $data['searchLesson'];
    return database()->query("SELECT * FROM lessons WHERE courseID ='$courseID' and title like '%$searchLesson%' ");
}
// create a new lesson 
function createNewLesson($data){
    $lessonName = $data["title"];
    $date = $data["date"];
    $courseID = $data["courseID"];
    return database()->query("INSERT INTO lessons(title,date,courseID)VALUES('$lessonName','$date','$courseID')");
}
// delete a lesson 
function deleteLession($lessonID){
    return database()->query("DELETE FROM lessons where lessonID = '$lessonID' ");
}
// get a Lesson to update 
function getALesson($lessonID){
    return database()->query("SELECT * from lessons where lessonID = '$lessonID'");
}
// update a Lesson 
function updateALesson($data){
    $Lesson = $data['title'];
    $lessonID = $data['lessonID'];
    $date = $data['date'];
    return database()->query("UPDATE lessons SET title = '$Lesson', date = '$date' where lessonID ='$lessonID' ");
}
//-------------------CRUD Lessons-------------//
//-------------------CRUD what you noted-------//
function getAllNoted($data){
    $searchNoted = $data['searchNoted'];
    $lessonID = $data['lessonID'];
    return database()->query("SELECT * FROM note WHERE lessonID = '$lessonID' and description like '%$searchNoted%'");
}
function addNewNoteText($data){
    $description = $data['description'];
    $lessonID = $data['lessonID'];
    return database()->query("INSERT INTO note(description,lessonID,image)
                            Values('$description','$lessonID','')");
}
function uploadImage($data){
    $lessonID = $data['lessonID'];
    $lessonName = $data['lessonName'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $dir='../../assets/images/note_images/'.$fileName;
    move_uploaded_file($tmp_name,$dir);
    return database()->query("INSERT INTO note(description,lessonID,image)Values('','$lessonID','$fileName')");
}
// delete image from crud 
function deleteImage($itemID){
    return database()->query("DELETE FROM note where itemID = '$itemID'");
}
// delete note Item 
function deleteNoteItem($itemID){
    return database()->query("DELETE FROM note where itemID = '$itemID'");
}
// getTextToUpdate 
function getTextToUpdate($itemID){
    return database()->query("SELECT * FROM note where itemID ='$itemID' ");
}
// updateText note 
function updateText($data){
    $itemID = $data['itemID'];
    $description = $data['description'];
    return database()->query("UPDATE note SET description ='$description' where itemID ='$itemID'");
}
//-------------------CRUD what you noted-------//
//---------------admin CRUD------------------//
function getAllUserData(){
    return database()->query("SELECT * FROM user");
}
function searchUser($data){
    $email = $data['search'];
    return database()->query("SELECT * FROM user Where email like '%$email%'");
}
function deleteUserbyAdmin($userID){
    return database()->query("DELETE from user where userID ='$userID'");
}
function GetUserByAdmin($userID){
    return database()->query("SELECT * from user where userID ='$userID'");
}
function DisableUserByAdmin($data){
    $email = $data["email"];
    $userID = $data["userID"];
    return database()->query("UPDATE user set email = '$email' ");
}