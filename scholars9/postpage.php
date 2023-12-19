<?php
//configurations
require_once 'C:\xampp\htdocs\Scholars\database\connect.php';
require_once 'C:\xampp\htdocs\scholars\inc\config.php';
//identifiers
$page_identifier = "postpage";
// ---------------------------------------------------------------------
//fetching the posts content
$post_content_query ="select 
(select url from user_profile_pictures where user_id = user_id order by picture_id desc limit 1) as profilePicture,
username,
topic,
text,
(select count(*) from comments where post_id = posts.post_id) as comments,
(select count(*) from likes where post_id = posts.post_id) as likes
from posts
left join users 
on posts.user_id = users.user_id
where post_id = $post_id;
";
$post_content = mysqli_fetch_assoc(mysqli_query($DB,$post_content_query));
//user actions (view|like) checker
$view_check_query = "select viewdate from views where user_id = $user_id and post_id = $post_id";
$my_view_status= mysqli_num_rows(mysqli_query($DB,$view_check_query));
$like_check_query = "select likedate from likes where user_id = $user_id and post_id = $post_id";
$my_like_status= mysqli_num_rows(mysqli_query($DB,$like_check_query));
//adding the view on the post
if($my_view_status != 1){
    $view_note_query = "insert into views(user_id,post_id) values('$user_id','$post_id')";
    mysqli_query($DB,$view_note_query);
}
// -------------------------------------------------------------------------
//query for getting the comments on a post
$comments_query ="select 
(select url from user_profile_pictures where user_id = user_id order by picture_id desc limit 1) as profilePicture,
username,
commentdate,
text,
comment_id
from comments 
left join users
on comments.user_id = users.user_id
where post_id = $post_id";
$comments = mysqli_fetch_all(mysqli_query($DB,$comments_query));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholars Forum</title>
    <link rel="stylesheet" href="build/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/css/indexStylev2.css">
    <link rel="stylesheet" href="libs/css/defaultNav.css">
    <link rel="stylesheet" href="libs/css/pagination.css">
    <link rel="stylesheet" href="libs/css/postpagev3.css">
    <script type="text/javascript" src="build/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="build/bootstrap/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="build/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="build/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="libs/js/defaultIndex.js" defer></script>
    <script type="text/javascript" src="postpagev3.js" defer></script>
    <script src="libs/js/livesearchv1.js" defer></script>

</head>

<body>
    <!-- header -->
    <?php include_once "inc/defaultNav.php"?>
    <!-- page main content -->
    <main class="container-fluid">
        <section class="row">
            <!-- posts comment and posting section -->
            <section class="col-md-8 p-0 pr-md-2">
                <!-- SECTION FOR POSTING -->
                <article class="shadow-sm new-topic">
                    <div class="new-topic-col  d-grid justify-content-center">
                        <img class="rounded-circle" src="<?php echo $post_content['profilePicture'];?>" alt="user profile picture">
                    </div>

                    <div class="new-topic-col new-topic-col2">
                        <!-- create a post form -->
                        <form action="index.php" method="post">
                            <input type="text" name="topic" placeholder="Enter Topic Title">
                            <!-- categories -->
                            <div>
                                <select name="category" id="category">
                                <option >Select Category</option>
                                <option >Option1</option>
                                <option >Option2</option>
                          </select>
                            </div>
                            <!-- text area -->
                            <textarea name="text_content" id="" cols="30" rows="10" placeholder="Description"></textarea>

                            <!-- submission -->
                            <div class="d-flex justify-content-between">
                                <div>
                                    <input type="checkbox" name="email-after" id="">
                                    <label for="email-after">Email after</label>
                                </div>

                                <div>
                                    <button id="post_a_post" class="btn btn-outline-primary" type="submit" name="post">POST</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </article>
                <!--SECTION FOR POST -->
                <section class="bg-white container-fluid mt-3 pb-3">
                    <!-- div for image and topic -->
                    <div class="row rounded-3 border-bottom p-3">
                        <!-- div for image -->
                        <div class="col-sm-1 p-0">
                            <img class="rounded-circle" src="<?php echo $post_content['profilePicture'];?>" alt="user profile image" />
                        </div>
                        <!-- div for topic and sender name -->
                        <div class="col-sm-11">
                            <!-- poster name -->
                            <div class="row poster-name">
                                <p>
                                <?php echo $post_content['username'];?> </p>
                            </div>
                            <!-- post title -->
                            <div class="row post-title">
                                <h3>
                                <?php echo $post_content['topic'];?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- div for message and details -->
                    <div class="row p-3">
                        <!-- post text -->
                        <p class="text-justify">
                        <?php echo $post_content['text'];?>
                        </p>

                    </div>
                    <!-- details -->
                    <div class="row mt-1">
                        <!-- comments -->
                        <div class="col text-success">
                            <p class="text-center">
                                <?php echo $post_content['comments']?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                            </p>
                        </div>
                        <!-- time left -->
                        <div class="col">
                            
                            <p id="button_like_post"  like_status="<?php if($my_like_status != 1){echo 'unliked';}else{echo 'liked';}?>" class="text-center">
                            <?php echo $post_content['likes']?> lik</p>
                        </div>
                        <!-- leave a comment -->
                        <?php if($login_status):?>
                        <div class="col">
                            <button id="leave_comment_button" class="btn btn-sm btn-primary">leave a comment</button>
                        </div>
                        <?php endif ?>
                    </div>
                    <!-- commenting form -->
                    <form class="container d-none form-group" id="leave_comment_form" action="" method="">
                            <textarea class="form-control" name="post_comment_text" id="post_comment_text" cols="" rows="3"></textarea>
                            <button class="btn btn-outline-primary mt-2" name="send_comment_button" id="send_comment_button" type="submit">send</button>
                    </form>
                </section>
                <!-- comments section -->
                <section class="container">
                <?php foreach ($comments as $key => $value) : ?>
                    <!-- comment -->
                    <div class="bg-white shadow rounded border-left my-2 p-2 border-primary comment-box"  commentId ="<?php echo $value[4];?>" >
                        <!-- comment header -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <img class="rounded-circle" src="<?php echo $value[0];?>" alt="user profile image" />
                                <p class="m-0"><?php echo $value[1];?></p>
                            </div>
                            <p class="text-muted align-self-center p-0 m-0"><?php echo $value[2];?></p>
                        </div>
                        <!-- comment text -->
                        <p class="text-break py-2"><?php echo $value[3];?>
                        </p>
                        <!-- replies container -->
                        <div class="p-2 d-none rounded comment_replies_container">
                            <button class="btn btn-sm mr-2 btn-outline-success comment_replies_hide_button">hide</button>
                            <p class="text-muted">replies...</p>
                            <!-- reply -->
                            <div class="replies_set">
                                <!-- <div class="bg-white mt-1 mb-2 p-2 shadow rounded border-info border-left comment_reply">
                                    <div class="d-flex">
                                        <img class="rounded-circle" src="uploads/profilePictures/avatar.jpg" alt="user profile image" style="width:20px"/><span style="font-size:smaller">Lorem, ipsum.</span>
                                    </div>
                                        <p class="text-muted">
                                            <small>Lorem ipsum dolor sit amet.</small>
                                        </p>
                                </div> -->
                            </div>
                        </div> 
                        <!-- reply form -->
                        <div class="d-flex p-1 justify-content-center">
                        <button class="btn btn-sm btn-outline-primary mx-1 comment_response_form_triggler_button">respond</button>
                        <button class="btn btn-sm btn-outline-primary mx-1 comment_replies_triggler_button">replies</button>
                        </div>
                        <form action="" class="d-none form-group" method="post">
                            <textarea class="rounded-left form-control ml-2" id="reply_text" rows="1"></textarea>
                            <button type="submit" class="btn-primary mr-2" id="reply_comment">sb</button>
                        </form>
                    </div>
                <?php endforeach ?>   
                </section>

            </section>
            <!-- user-guider-section and notifications -->
            <section class="col-md-4 mt-3 p-0 user-guider-section">
                <!-- categories -->
                <div class="categories bg-white p-2">
                    <h2 class="pb-2 text-center">Categories</h2>
                    <div><a href="">Physics</a></div>
                    <div><a href="">Computer Science</a></div>
                    <div><a href="">Mathematics</a></div>
                    <div><a href="">Math Competitions</a></div>
                    <div><a href="">Programming</a></div>
                    <div><a href="">Physics Projects</a></div>
                    <div><a href="">Chemistry</a></div>
                </div>
                <!-- active threads -->
                <div class="categories bg-white p-2">
                    <h2 class="pb-2 text-center">My Active Threads</h2>
                    <div class="active-threads-list">
                        <div><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ea?</a></div>
                        <div><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ea?</a></div>
                        <div><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ea?</a></div>
                        <div><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ea?</a></div>
                        <div><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ea?</a></div>
                        <div><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ea?</a></div>
                        <div><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ea?</a></div>
                        <div><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, ea?</a></div>
                    </div>
                </div>
            </section>
        </section>

        <!-- Pagination section -->
        <section class="row d-flex justify-content-center p-3 text-decoration-none pagination">
        </section>
    </main>
    <!-- footer  and pagination scripting -->
</body>

</html>