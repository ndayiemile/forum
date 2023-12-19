<header>
        <!-- header image container -->
        <?php if($page_identifier != "profiles"):?>
            <div class="d-none d-sm-block header-div">
            </div>
         <?php endif ?>
        <!-- Navigation bar  -->
        <nav class="navbar navbar-expand-sm sticky-top bg-dark navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="<?php if($page_identifier == "profiles"){echo "../";}?>dipository/img/admin_uploads/profile_photos/photo1.png" alt="logo" style="width:50px;height:50px;border-radius: 100%;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <!-- posting form button -->
                    <?php if($logged_in && $page_identifier != "profiles"):?>
				        <li class="nav-item ml-0 mx-sm-1 my-1">
					        <button class="btn nav-link  icon btn-outline-secondary start-new-topic" value="Link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16">
                                    <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z"/>
                                    <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z"/>
                                </svg>
                            </button>
				        </li>
                    <?php endif?>
                    <!--dropdown-->
                    <li class="nav-item  my-1 ml-0 mx-sm-1 bg-dark dropdown">
                        <button type="button" class="btn icon btn-outline-secondary nav-link" id="navbardrop" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                            </svg>
                        </button>
                        <div class="dropdown-menu nav-home-dropdown">
                            <?php if($page_identifier != "indexpage"):?>
                                <a class="dropdown-item" href="index.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                    </svg> home
                                </a>
                            <?php endif?>   
                            <?php if($logged_in):?>
                            <a class="dropdown-item" href="users/profiles.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg> profile
                            </a>
                            <?php endif?>
                            <a class="dropdown-item" href="<?php if($logged_in){echo 'users/logout.php';}else{echo 'users/login.php';}?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg><?php if($logged_in){echo "log out";}else{echo "log in";}?>
                            </a>
                        </div>
                    </li>
                    <li class="mx-sm-1 nav-item dropdown searchbox">
                        <div class="d-flex justify-content-center h-100 nav-link p-0" data-toggle="dropdown">
                            <div class="searchbar">
                                <input class="search_input" id="search_input" type="text" name="" placeholder="Search..."/>
                                <a href="#" class="search_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <form class="p-2 py-sm-2 pl-sm-2 pr-sm-0 shadow border-0 dropdown-menu nav-search-dropdown" action="postpage.php" method="post" id="search_dropdown">
                            <!-- <button type="submit" name="post_request" value="" class="dropdown-item mx-0 my-1 p-0 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing</button> -->
                            </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>