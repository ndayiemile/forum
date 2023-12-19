<?php
//configurations
require_once 'C:\xampp\htdocs\Scholars\database\connect.php';
require_once 'C:\xampp\htdocs\scholars\inc\config.php';
$page_identifier ="profiles";
$profile_query ="select 
username,
(select url from user_profile_pictures where user_profile_pictures.user_id = users.user_id) as url,
(select count(*) from posts where posts.user_id = users.user_id) as posts
from users 
where 
user_id = $user_id";
$profile_data = mysqli_fetch_assoc(mysqli_query($DB,$profile_query));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../build/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../libs/css/profilev1.css">
    <link rel="stylesheet" href="../libs/css/defaultNav.css">
    <script src="../build/bootstrap/jquery/jquery.slim.min.js"></script>
    <script src="../build/bootstrap/js/popper.min.js"></script>
    <script src="../build/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../libs/js/user_profilev2.js" defer></script>
    <script src="../libs/js/defaultHeader.js" defer></script>
    <title>profiles</title>
</head>

<body>
     <!-- header -->
     <?php include_once '../inc/defaultNav.php'?>
    <!-- page main content -->
     <main class="container my-5">
        <section class="row align-items-center">
            <div class="col-sm-6 profile_upload_div h-100">
                <div class="d-flex justify-content-center user-profile-image_container">
                    <form action="userProfiles.php" method="post" enctype="multipart/form-data" id="form_profile_picture">
                        <input type="file" id="profile_update_input" name="profile_image" class="border d-none" />
                        <input type="submit" id="profile_update_button" value="update" class="btn btn-dark" name="button_profile_update" />
                    </form>
                    <img src="../uploads/profilePictures/avatar.jpg" alt="user-profile picrure " class="rounded-circle w-50 w-md-20" >
                </div>
            </div>
            <div class=" d-flex align-items-center col-sm-6 h-100">
                <div class="p-3 ">
                    <div class="row py-sm-2 "><?php echo $profile_data['username']?>
                    </div>
                    <div class="row py-sm-2 ">posts <?php echo $profile_data['posts']?></div>
                    <div class="row py-sm-2 "><button class="my-3 btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#manage-account-modal">Manage account</button></div>
                </div>
            </div>
        </section>
        <section class="py-2 ">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs " role="tablist ">
                <li class="nav-item ">
                    <a class="nav-link active" data-toggle="tab" href="#home">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Profile</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content ">
                <div id="home" class="container tab-pane active py-5">
                    <h2>Posts</h2>
                    <form action="" method="post">
                        <table class="table table-sm table-striped table-responsive table-hover rounded">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-left">Post title</th>
                                    <th class="px-3">Postdate</th>
                                    <th class="px-3">Views</th>
                                    <th class="px-3">likes</th>
                                    <th class="px-3">comments</th>
                                    <th class="table-success">action</th>
                                </tr>
                            </thead>
                            <tbody id="posts_history_table_body">
                                <tr class="text-center">
                                    <td style="white-space: nowrap;
                                        max-width: 200px;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        text-transform:capitalize;" class="text-right">Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet </td>
                                    <td>2022-03-30 21:14:30</td>
                                    <td>45</td>
                                    <td>45</td>
                                    <td>45</td>
                                    <td class="d-flex justify-content-center"><button class="btn btn-outline-danger mx-1">er</button>
                                        <button class="btn btn-outline-warning  mx-1">er</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div id="menu1" class="row d-flex justify-content-center tab-pane fade p-0 ">
                    <form id="editProfile" class="mt-3 col-11 col-sm-10 p-4 col-lg-6 shadow rounded border border-primary" action=" " method="post ">
                        <h2>Edit your profile</h2>
                        <label for="email" class="form-label">Psername</label>
                        <input type="text" class="form-control" id="new-username" placeholder="optional">
                        <label for="previous-password" class="form-label">current Password</label>
                        <input type="password" class="form-control" id="previous-password" placeholder="required" required/>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="new-password" placeholder="optional" />
                        <label for="confirm-password" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" id="confirm-password" placeholder="depends" />
                        <div class="my-4 text-center">
                            <button type="submit" class="btn btn-secondary" id="saveProfile">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- modal -->
        <section class="manage-account">
            <div id="manage-account-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="my-modal-title">Manage account</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                            <form action="userProfiles.php" method="post" id="manage_account_form">
                                <div class="form-group">
                                    <label for=""></label>
                                    <select class="custom-select" name="manage_account_select" id="manage_account_select">
                                       <option value="message">contact developer</option>
                                       <option value="delete">delete account</option>
                                       <option value="reset">reset data</option>
                                   </select>
                                </div>

                                <div class="form-group">
                                    <label for="textarea" class="col-sm-2 control-label">message:</label>
                                    <textarea name="manage_account_message" id="manage_account_message" class="form-control" rows="3" required="required"></textarea>
                                </div>
                                <div class="row justify-content-end px-3">
                                    <button type="submit" class="btn btn-primary" name="manage_account_button" id="manage_account_button">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>