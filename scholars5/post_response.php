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
    mysqli_query($DB,$commenting_query);
}
//query for sending a reply text on comment(handled from ajax)
if(isset($_GET["comment_reply_json_data"])){
    //variables
    $json_data = $_GET["comment_reply_json_data"];
    $data =json_decode($json_data);
    $comment_id = $data[0];
    $text = $data[1];
    $user_id = $_SESSION['user_id'];
    //query
    $replying_query ="insert into comment_replies(comment_id,user_id,text) values ('$comment_id','$user_id','$text')";
    mysqli_query($DB,$replying_query);
}
?>