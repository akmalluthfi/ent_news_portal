<?php
require './functions.php';

authenticatedMiddleware();

if (isset($_POST['logout'])) {
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: /login");
    exit;
} else {
    header("Location: /");
}
