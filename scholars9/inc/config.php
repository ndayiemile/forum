<?php
// number of posts per home page
$number_of_posts_per_home_page = 5;

//user_id initializion
if(!isset($_SESSION['user_id'])){
    //compulsory login redirector
    // header('location:authentication/phps/login.php');
    $login_status = false;
  }
  else{
    $login_status = true;
    $user_id = $_SESSION['user_id'];
}

//$_SESSION['post_id'] initialization
if(isset($_POST['post_request'])){
  $_SESSION['post_id'] = $_POST['post_request'];
}

//post_id initialization
if(isset($_SESSION['post_id'])){
 $post_id = $_SESSION['post_id'];
}
?>