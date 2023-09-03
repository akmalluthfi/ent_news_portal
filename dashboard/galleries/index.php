<?php
require './functions.php';

authenticatedMiddleware();

$userId = $_SESSION['user_id'];
$posts = getPosts("SELECT * FROM posts WHERE user_id = $userId");

?>

<?php require '../../components/header.php' ?>

<?php require '../../components/navbar.php' ?>

<h1>Hello Gallery</h1>

<?php require '../../components/footer.php' ?>