<?php
//configurations
require_once 'C:\xampp\htdocs\Scholars\database\connect.php';
require_once 'C:\xampp\htdocs\scholars\inc\config.php';
// ---------------------------------------------------------------------
//fetching the posts content
$post_id = $_POST['post_request'];
$post_content_query ="select 
(select url from user_profile_pictures where user_id = user_id order by picture_id desc limit 1) as profilePicture,
username,
topic,
text,
(select count(*) from likes where post_id = posts.post_id) as likes,
(select count(*) from comments where post_id = posts.post_id) as comments,
postdate,
posts.post_id
from posts
left join users 
on posts.user_id = users.user_id
having post_id = $post_id;
";
$post_content = mysqli_fetch_assoc(mysqli_query($DB,$post_content_query));
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
    <link rel="stylesheet" href="libs/css/indexStyle.css">

    <script type="text/javascript" src="build/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="build/bootstrap/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="build/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="build/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="module" src="libs/js/homs.js" defer></script>
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
                <section class="bg-white container-fluid mt-3">
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
                        <!-- likes -->
                        <div class="col">
                            <p class="text-center">
                                34<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                            </p>
                        </div>
                        <!-- comments -->
                        <div class="col">
                            <p class="text-center">
                                45 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                            </p>
                        </div>
                        <!-- time left -->
                        <div class="col">
                            <p class="text-center">
                                50 min</p>
                        </div>
                    </div>
                </section>
                <!-- comments section -->
                <section class="container">
                <?php foreach ($comments as $key => $value) : ?>
                    <!-- comment -->
                    <div class="bg-white shadow rounded border-left my-2 p-2 border-primary">
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
                        <!-- reply form -->
                        <form action="" class="d-flex form-group" method="post">
                            <button type="submit" class="btn-primary mx-2">sb</button>
                            <textarea class="rounded-left form-control ml-2" name="" id="" rows="1"></textarea>
                            <button type="submit" class="btn-primary mr-2" name="comment">sb</button>
                            <button type="submit" class="btn-primary mx-2" name="like">lk</button>
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