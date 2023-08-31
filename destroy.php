<?php
require './functions.php';

// check if parameter doesn't exists
if (empty($_GET['id'])) header("Location: /index.php");

$id = $_GET['id'];

// check if post deleted successfully
if (destroyPost($id) > 0) {
    echo "
        <script>
            alert('delete post successfully!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('post failed to delete!');
            document.location.href = 'index.php';
        </script>
    ";
}