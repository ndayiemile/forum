<?php
include 'C:\xampp\htdocs\scholars\database\connect.php';
//initialization
$valid_password_and_username = true;
//USER SIN iN
if(isset($_POST['login'])){
    $username = mysqli_escape_string($DB,$_POST['username']);
    $password = mysqli_escape_string($DB,$_POST['password']);
    $sql = "SELECT user_id FROM users WHERE username = '$username' AND password = '$password'";
    $sql_in = mysqli_query($DB,$sql);
    if(mysqli_num_rows($sql_in) == 1){
      $user_id = mysqli_fetch_assoc($sql_in);
       $_SESSION['user_id'] = $user_id['user_id'];
       header('location:../index.php');
    }else{
        $valid_password_and_username = false;
    }
}
//USER SIN UP
if(isset($_POST['sinup'])){
    $username = mysqli_escape_string($DB,$_POST['username']);
    $password = mysqli_escape_string($DB,$_POST['password']);
    $sql = "INSERT INTO users(username,password) VALUES ('$username','$password')";
    if(mysqli_query($DB,$sql)){
        $query = "SELECT user_id FROM users WHERE username = '$username' AND password = '$password'";
        $query_in = mysqli_query($DB,$query);
        $user_id = mysqli_fetch_assoc($query_in);
        $_SESSION['user_id'] = $user_id['user_id'];
        $user_id = $user_id['user_id'];
        //profile picture initialization
        $profiling_sql = "INSERT INTO user_profile_pictures(user_id) VALUES ('$user_id')";
        mysqli_query($DB,$profiling_sql);
        //header to home page
        header('location:../index.php');
    }else{
        echo "could not sinup";
    }
}
//USER VERIFICATION
if(isset($_GET['suggested_username'])){
    $suggested_username = $_GET['suggested_username'];
    $check_username_query ="select * from users where username = '$suggested_username'";
    $rows_count = mysqli_num_rows(mysqli_query($DB,$check_username_query));
    if($rows_count > 0){
        echo "exist";
    }
}
?>