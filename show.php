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

<?php require './components/header.php' ?>

<?php require './components/navbar.php' ?>

<!-- Page content-->
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?= $post['title']; ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on <?= date("F j, Y", strtotime($post['updated_at'])); ?> by Start Bootstrap</div>
                    <!-- Post categories--><a class="badge bg-secondary text-decoration-none link-light me-2" href="#!">Web Design</a><a class="badge bg-secondary text-decoration-none link-light me-2" href="#!">Freebies</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="/images/<?= $post['image'] ?>" alt="Post Image"></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p><?= $post['body']; ?></p>
                </section>
            </article>

            <!-- Back Button -->
            <a href="/" class="btn btn-secondary">Back</a>

        </div>
    </div>
</div>

<?php require './components/footer.php' ?>