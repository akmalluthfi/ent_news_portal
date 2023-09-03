<?php
require './functions.php';

authenticatedMiddleware();

$userId = $_SESSION['user_id'];
$posts = getPosts("SELECT * FROM posts WHERE user_id = $userId");

?>

<?php require '../../components/header.php' ?>

<?php require '../../components/navbar.php' ?>

<div class="container">
    <h1 class="fs-5">Posts</h1>

    <div class="d-flex justify-content-end my-3">
        <a href="/dashboard/create" role="button" class="btn btn-success">Create</a>
    </div>

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
                <?php if (empty($posts)) : ?>
                    <tr>
                        <td colspan="4" class="text-center text-danger fs-5">
                            No data
                        </td>
                    </tr>

                <?php else : ?>
                    <?php foreach ($posts as $index => $post) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1; ?></th>
                            <td>
                                <img src="../images/<?= $post['image'] ?>" alt="" class="object-fit-cover border rounded" style="width: 10rem;">
                            </td>
                            <td><?= $post['title']; ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/dashboard/show?id=<?= $post['id'] ?>" role="button" class="btn btn-primary">Detail</a>
                                    <a href="/dashboard/edit?id=<?= $post['id'] ?>" role="button" class="btn btn-secondary">Edit</a>
                                    <a href="/dashboard/destroy?id=<?= $post['id'] ?>" role="button" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require '../../components/footer.php' ?>