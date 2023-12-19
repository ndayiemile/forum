<?php
//configurations
require_once 'C:\xampp\htdocs\Scholars\database\connect.php';
require_once 'C:\xampp\htdocs\scholars\inc\config.php';
// -------------------------------------------------------------------------
//query for adding a like on the post
if(isset($_GET["post_add_like"])){
    //query
    $like_check_query = "select likedate from likes where user_id = $user_id and post_id = $post_id";
    $my_like_status= mysqli_num_rows(mysqli_query($DB,$like_check_query));
    if($my_like_status != 1){
        $liking_query ="insert into likes(post_id,user_id) values ('$post_id','$user_id')";
        mysqli_query($DB,$liking_query);
   }
}

//query for sending a comment(handled from ajax)
if(isset($_GET["post_comment_text"])){
    //variables
    $text = $_GET["post_comment_text"];
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
    //query
    $replying_query ="insert into comment_replies(comment_id,user_id,text) values ('$comment_id','$user_id','$text')";
    mysqli_query($DB,$replying_query);
}

//query for fetching a comment's relies(handled from ajax)
if(isset($_GET['comment_replies'])){
    //variables
    $comment_id = $_GET['comment_replies'];
    //query
    $comment_replies_query ="select 
    (select url from user_profile_pictures where user_id = user_id order by picture_id desc limit 1) as profilePicture,
    username,
    `text` from comment_replies 
    left join users
    on users.user_id = comment_replies.user_id
    where comment_id = $comment_id";
    $comment_replies = mysqli_fetch_all(mysqli_query($DB,$comment_replies_query));
    $comment_replies =json_encode($comment_replies);
    echo $comment_replies;
}
?>