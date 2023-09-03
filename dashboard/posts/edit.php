<?php
require './functions.php';

authenticatedMiddleware();

// check if parameter doesn't exists
if (empty($_GET['id'])) header("Location: /dashboard");

$id = $_GET['id'];

[$post] = getPosts("SELECT * FROM posts WHERE id=$id");

// check if button submit is pressed
if (isset($_POST['submit'])) {

    // prepare data
    $data = [
        'id' => $id,
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'old_image' => $post['image'],
        'image' => $_FILES['image'],
    ];

    // check if post created successfully
    if (updatePost($data) > 0) {
        echo "
			<script>
				alert('updated post successfully!');
				document.location.href = '/dashboard/posts';
			</script>
		";
    } else {
        echo "
			<script>
				alert('post failed to update!');
			</script>
		";
    }
}

?>

<?php require '../../components/header.php' ?>

<?php require '../../components/navbar.php' ?>

<div class="container">
    <div class="d-flex justify-content-end">
        <a href="/dashboard" role="button" class="btn btn-secondary mb-3">Back</a>
    </div>

    <h1 class="fs-5 mb-3">Edit Posts</h1>

    <form action="" method="post" enctype="multipart/form-data" class="mb-5">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Input your title" value="<?= $post['title'] ?>">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" rows="3" name="body" required placeholder="Input your content"><?= $post['body'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label mb-3 d-block">Upload Image</label>

            <img src="/images/<?= $post['image'] ?>" alt="<?= $post['title'] ?> Image" class="rounded mb-3" style="width: 18rem;">

            <input class="form-control" type="file" id="image" name="image">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require '../../components/footer.php' ?>