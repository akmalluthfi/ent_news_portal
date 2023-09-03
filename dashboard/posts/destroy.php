<?php
require './functions.php';

authenticatedMiddleware();

// check if parameter doesn't exists
if (empty($_GET['id'])) header("Location: /dashboard/posts");

$id = $_GET['id'];

// check if post deleted successfully
if (destroyPost($id) > 0) {
    echo "
        <script>
            alert('delete post successfully!');
            document.location.href = '/dashboard/posts';
        </script>
    ";
} else {
    echo "
        <script>
            alert('post failed to delete!');
            document.location.href = '/dashboard/posts';
        </script>
    ";
}
