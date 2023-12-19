<?php
// number of posts per home page
$number_of_posts_per_home_page = 5;
// --------------------------------------------------------------------------
if(!isset($_SESSION['user_id'])){
    //compulsory login redirector
    // header('location:authentication/phps/login.php');
    $login_status = false;
  }else{
    $login_status = true;
  }
?>