<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    $data = [
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'image' => $_FILES['image'],
    ];

    // check if post created successfully
    if (createPosts($data) > 0) {
        echo "
			<script>
				alert('created post successfully!');
				document.location.href = 'index.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('post failed to create!');
				document.location.href = 'index.php';
			</script>
		";
    }
}
?>

<?php require './views/header.php' ?>

<div class="container">
    <div class="d-flex justify-content-end">
        <a href="/index.php" role="button" class="btn btn-secondary mb-3">Back</a>
    </div>

    <h1 class="fs-5 mb-3">Create Posts</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Input your title">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" rows="3" name="body" required placeholder="Input your content"></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="image" name="image" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require './views/footer.php' ?>