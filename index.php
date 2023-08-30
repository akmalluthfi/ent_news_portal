<?php
require './functions.php';

$posts = getPosts("SELECT * FROM posts");

var_dump($posts);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
</head>

<body>
    <h1>News Portal</h1>
</body>

</html>