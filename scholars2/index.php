<?php
//configurations
require_once 'C:\xampp\htdocs\Scholars\database\connect.php';
require_once 'C:\xampp\htdocs\scholars\inc\config.php';
// ---------------------------------------------------------------------
//page request hundler
//query for getting the number of posts
$num_posts_query = "SELECT count(*) as num_of_posts FROM posts";
$num_posts_in = mysqli_query($DB,$num_posts_query);
$num_posts = mysqli_fetch_assoc($num_posts_in);
$num_posts = $num_posts['num_of_posts'];
//num of pages
$num_of_pages = ceil($num_posts/$number_of_posts_per_home_page);
if(isset($_POST['page'])){
    $page = $_POST['page'];
    $initial_post = ($page-1)*$number_of_posts_per_home_page;
}
else{
    $page = 1;
    $initial_post = 0;
}
// ---------------------------------------------------------------------
// query for displaying posts
$get_posts_query = "select 
(select url from user_profile_pictures where user_id = user_id order by picture_id desc limit 1) as profilePicture,
username,
topic,
text,
(select count(*) from views where post_id = posts.post_id) as views,
(select count(*) from likes where post_id = posts.post_id) as likes,
(select count(*) from comments where post_id = posts.post_id) as comments,
postdate
from posts
left join users 
on posts.user_id = users.user_id
order by posts.post_id desc
limit $initial_post,$number_of_posts_per_home_page";
$post_query_execute = mysqli_query($DB,$get_posts_query);
$show_posts_query = mysqli_fetch_all($post_query_execute);  

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
            <section class="col-md-8 p-0">
                <article class="shadow-sm mr-md-3 new-topic">
                    <div class="new-topic-col  d-grid justify-content-center">
                        <img class="rounded-circle" src="uploads/profilePictures/avatar" alt="user profile picture">
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

                                <select name="category" id="category">
                                <option >Select Subcategory</option>
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
                <!-- SECTION FOR POSTS -->
                <section class="container-fluid posts-section">
                <?php foreach ($show_posts_query as $key => $value) : ?>
                    <!-- POST section -->
                    <form class="bg-white container-fluid mt-3 post post-form" action="incs/currentPostv2.php" method="post">
                        <!-- div for image and topic -->
                        <div class="row rounded-3 border-bottom p-3">
                            <!-- div for image -->
                            <div class="col-sm-1 p-0">
                                <img class="rounded-circle" src="<?php echo $value[0];?>" alt="user profile image" />
                            </div>
                            <!-- div for topic and sender name -->
                            <div class="col-sm-11">
                                <!-- poster name -->
                                <div class="row poster-name">
                                    <p><?php echo $value[1];?></p>
                                </div>
                                <!-- post title -->
                                <div class="row post-title">
                                    <h3>
                                    <?php echo $value[2];?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- div for message and details -->
                        <div class="row p-3">
                            <!-- post text -->
                                <p class="text-justify">
                                <?php echo $value[3];?>
                                </p>
    
                        </div>
                        <!-- details -->
                        <div class="row mt-1">
                            <!-- views -->
                            <div class="col">
                                <p class="text-center"><?php echo $value[4];?><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                          </svg></p>
                            </div>
                            <!-- likes -->
                            <div class="col">
                                <p class="text-center"><?php echo $value[5];?><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                          </svg></p>
                            </div>
                            <!-- comments -->
                            <div class="col">
                                <p class="text-center"><?php echo $value[6];?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                              <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                              <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                              </svg>
                                </p>
                            </div>
                            <!-- time left -->
                            <div class="col">
                                <p class="text-center"><?php echo $value[7];?> min</p>
                            </div>
                        </div>
                        <input type="hidden" name="post_id" value="2">
                        <input type="submit" value="">
                    </form>
                <?php endforeach //end foreach?>
                </section>
            </section>
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
  <?php include_once "inc/footer.php"?>
</body>

</html>