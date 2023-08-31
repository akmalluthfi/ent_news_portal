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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">

        <div>
            <label for="title">Title : </label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="body">Body : </label>
            <textarea type="text" name="body" id="body" required></textarea>
        </div>

        <div>
            <label for="image">Image : </label>
            <input type="file" name="image" id="image">
        </div>

        <button type="submit" name="submit">Create</button>
    </form>
</body>

</html>