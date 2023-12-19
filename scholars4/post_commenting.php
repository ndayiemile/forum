<?php
//configurations
require_once 'C:\xampp\htdocs\Scholars\database\connect.php';
// -------------------------------------------------------------------------
//query for sending a comment(handled from ajax)
if(isset($_GET["post_comment_text"])){
    //vsriables
    $text = $_GET["post_comment_text"];
    $user_id = $_SESSION['user_id'];
    $post_id = $_SESSION['post_id'];
    //query
    $commenting_query ="insert into comments(post_id,user_id,text) values ('$post_id','$user_id','$text')";
    if(!mysqli_query($DB,$commenting_query)){
        $error_msg ="commenting failed";
        header('location:404.php');
    }
}
?>