<?php
require './functions.php';

$posts = getPosts("SELECT * FROM posts");

?>

<?php require './views/header.php' ?>

<div class="container">
    <h1 class="fs-5">Posts</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $index => $post) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td>
                            <img src="./image/<?= $post['image'] ?>" alt="" class="object-fit-cover border rounded" style="width: 10rem;">
                        </td>
                        <td><?= $post['title']; ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="/show.php?id=<?= $post['id'] ?>" role="button" class="btn btn-primary">Detail</a>
                                <a href="/edit.php?id=<?= $post['id'] ?>" role="button" class="btn btn-success">Edit</a>
                                <a href="/destroy.php?id=<? $post['id'] ?>" role="button" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require './views/footer.php' ?>