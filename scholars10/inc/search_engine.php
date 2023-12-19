<?php
//configurations
require_once 'C:\xampp\htdocs\Scholars\database\connect.php';
//search engine
if(isset($_GET['search_input'])){
$topic = $_GET['search_input'];   
$search_query ="select post_id,topic 
from posts 
where topic like '%$topic%'
limit 10";
$suggestions = mysqli_fetch_all(mysqli_query($DB,$search_query));
$suggestions = json_encode($suggestions);
echo $suggestions;
}
?>