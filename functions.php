<?php

$conn = mysqli_connect('localhost', 'root', '', 'ent_news-portal');

function getPosts($query)
{
    global $conn;

    // query data
    $result = mysqli_query($conn, $query);

    // return result query data in array
    $posts = [];
    while ($post = mysqli_fetch_assoc($result)) {
        $posts[] = $post;
    }

    return $posts;
}

function uploadImage($image)
{
    $name = $image['name'];
    $size = $image['size'];
    $error = $image['error'];
    $tmpName = $image['tmp_name'];

    // check uploaded file
    if ($error === 4) {
        echo "
            <script>
				alert('The Image field is required. ');
			</script>
        ";

        return false;
    }

    // check extension of image
    $validExt = ['jpg', 'jpeg', 'png'];
    $imageExt = explode('.', $name);
    $imageExt = strtolower(end($imageExt));

    if (!in_array($imageExt, $validExt)) {
        echo "
            <script>
			    alert('The Image field must be an image.');
			</script>
        ";
        return false;
    }

    // generate new file name
    $newName = date('Y_m_d_His') . "_" . $name;

    // upload  file
    move_uploaded_file($tmpName, 'images/' . $newName);

    return $newName;
}

function createPosts($post)
{
    global $conn;

    // escape chars
    $title = htmlspecialchars($post['title']);
    $body = htmlspecialchars($post['body']);

    // insert timestamp for updated_at and created_at
    $timestamp = date('Y-m-d H:i:s');

    // upload image
    $image = uploadImage($post['image']);
    // if uploaded error
    if (!$image) return false;

    // insert post
    $query = "INSERT INTO posts(image, title, body, created_at, updated_at)
                VALUES
                ('$image', '$title', '$body', '$timestamp', '$timestamp')
            ";

    mysqli_query($conn, $query);

    // return result from affected rows
    return mysqli_affected_rows($conn) > 0;
}

function updatePost($post)
{
    global $conn;

    // escape chars
    $id = htmlspecialchars($post['id']);
    $oldImage = htmlspecialchars($post['old_image']);
    $title = htmlspecialchars($post['title']);
    $body = htmlspecialchars($post['body']);

    // is user upload new image
    if ($post['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        unlink("./images/$oldImage");
        $image = uploadImage($post['image']);
    }

    // set new timestamp
    $timestamp = date('Y-m-d H:i:s');

    // update the data
    $query = "UPDATE posts SET 
                image = '$image',
                title = '$title',
                body = '$body',
                updated_at = '$timestamp'
            WHERE id = $id
    ";

    mysqli_query($conn, $query);

    // return result from affected rows
    return mysqli_affected_rows($conn);
}


function destroyPost($id)
{
    global $conn;


    $result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
    $post = mysqli_fetch_assoc($result);

    $image = $post['image'];
    // delete image
    unlink("./images/$image");
    // delete data
    mysqli_query($conn, "DELETE FROM posts WHERE id = $id");

    // return result from affected rows
    return mysqli_affected_rows($conn);
}
