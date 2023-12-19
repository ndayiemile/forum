<?php
//configurations
require_once 'C:\xampp\htdocs\Scholars\database\connect.php';
require_once 'C:\xampp\htdocs\scholars\inc\config.php';

//fetching userposts posts 
if(isset($_GET['current_user_posts_sort'])){
    $current_user_posts_query ="select 
    post_id,
    topic,
    date(postdate),
    (select count(*) from views where post_id = posts.post_id) as views,
    (select count(*) from likes where post_id = posts.post_id) as likes,
    (select count(*) from comments where post_id = posts.post_id) as comments
    from posts 
    left join users 
    on posts.user_id = users.user_id
    where users.user_id = $user_id
    order by posts.post_id desc";
    $current_user_posts = mysqli_fetch_all(mysqli_query($DB,$current_user_posts_query));
    $current_user_posts = json_encode($current_user_posts);
    echo $current_user_posts;
}
// profile image update
if(isset($_POST['button_profile_update'])){
    // initialise the file data
    $file = $_FILES['profile_image'];
    $fileName = $_FILES['file']['name'];
    var_dump($file);
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSise = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    //get the file name
    $fileExt = explode('.',$fileName);
    $fileActualext = strtolower(end($fileExt));

    // validate allowed datatypes
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActualext,$allowed)){
        if($fileError === 0){
            if($fileSise < 100000){
                $fileNameNew = uniqid('',true).".".$fileActualext;
                $fileDestination = 'uploads/profilePictures/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                echo "well updated";
            }else{
                echo "your file is too big";
            }
        }else{
            echo "file corrupted on upload";
        }
    }else{
        echo "file type not supported";
    }
}

//USER PROFILE UPDATE
if(isset($_GET['update_profile'])){
    $newProfile = json_decode($_GET['update_profile']);
    echo $newProfile[0];
    $newUsername = $newProfile[0];
    $previousPassword = $newProfile[1];
    $newPassword = $newProfile[2];
    //validate the password 
    $currentPassword_query_check = "SELECT `password` FROM users WHERE `user_id` =$user_id";
    $currentPassword_string = mysqli_fetch_assoc(mysqli_query($DB,$currentPassword_query_check));
    $currentPassword = $currentPassword_string['password'];
    if($currentPassword === $previousPassword){
        $sql = false;
        if($newProfile[3] =="all"){
            $sql = "UPDATE users SET `username` ='$newUsername',`password` ='$newPassword' where `user_id` =$user_id";
        }elseif($newProfile[3] =="password"){
            $sql = "UPDATE users SET `password` ='$newPassword' where `user_id` =$user_id";
        }elseif($newProfile[3] =="username"){
            $sql = "UPDATE users SET `username` ='$newUsername',`password` where `user_id` =$user_id";
        }else{
            echo "invalid input";
        }
        if($sql){
            if(mysqli_query($DB,$sql)){
            echo " "."profile well updated";
        }
        }
    }else{
        echo "wrong password";
    }
}
// manage account
if(isset($_POST['manage_account_button'])){
    $action = $_POST['manage_account_select'];
    if($action == "message"){
        $message_query = "INSERT INTO users_suggestions(`user_id`,suggetion,action_done) VALUES ('$user_id','$suggestion','$action')";
        mysqli_query($DB,$message_query);
        header('location:profiles.html');
    }elseif ($action == "delete") {
        $suggestion_query = "INSERT INTO users_suggestions(`user_id`,suggetion,action_done) VALUES ('$user_id','$suggestion','$action')";
        $delete_query = "DELETE FROM users WHERE `user_id` = $user_id";
        mysqli_query($DB,$suggestion_query);
        mysqli_query($DB,$delete_query);
        header('location:logout.php');
    }else{
        // message query
        $reset_query = "INSERT INTO users_suggestions(`user_id`,suggetion,action_done) VALUES ('$user_id','$suggestion','account_reset')";
        mysqli_query($DB,$reset_query);
        // reset query
        $reset_query = "DELETE FROM posts WHERE `user_id` = $user_id";
        mysqli_query($DB,$reset_query);
        header('location:profiles.html');
    }
}
?>