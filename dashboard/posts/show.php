<?php
require './functions.php';

authenticatedMiddleware();

// check if parameter doesn't exists
if (empty($_GET['id'])) header("Location: /dashboard");

$id = $_GET['id'];

if (!is_numeric($id)) {
    echo "
			<script>
				alert('Invalid parameter');
				document.location.href = '/';
			</script>
		";

    exit;
}

$posts = getPosts("SELECT * FROM posts WHERE id=$id");

if (empty($posts)) {
    echo "
            <script>
                alert('query error!');
                document.location.href = '/dashboard';
            </script>
        ";

    exit;
} else {
    $post = $posts[0];
}



?>

<?php require '../../components/header.php' ?>

<?php require '../../components/navbar.php' ?>

<div class="container">

    <div class="mb-5">
        <h1 class="fs-5 mb-3"><?= $post['title'] ?></h1>

        <img src="/images/<?= $post['image'] ?>" alt="<?= $post['title'] ?> Image" class="rounded mb-3" style="width: 18rem;">

        <p><?= $post['body']; ?></p>
    </div>

    <div class="d-flex justify-content-end mb-4">
        <a href="/dashboard/posts" role="button" class="btn btn-secondary mb-3">Back</a>
    </div>
</div>

<?php require '../../components/footer.php' ?>