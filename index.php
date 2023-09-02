<?php
require './functions.php';

$posts = getPosts("SELECT * FROM posts");

// var_dump(count($posts) > 1);
// die();


?>

<?php require './components/header.php' ?>

<?php require './components/navbar.php' ?>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <?php if (empty($posts)) : ?>
                <h3 class="my-3 text-danger text-center">No Posts Avaiable</h3>
            <?php else : ?>
                <?php if (count($posts) >= 1) : ?>
                    <!-- Featured blog post-->
                    <div class="card mb-4"><a href="/show?id=<?= $posts[0]['id'] ?>"><img class="card-img-top" src="/images/<?= $posts[0]['image'] ?>" alt="Post Image"></a>
                        <div class="card-body">
                            <div class="small text-muted"><?= date("F j, Y", strtotime($posts[0]['updated_at'])); ?></div>
                            <h2 class="card-title"><?= $posts[0]['title']; ?></h2>
                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p> -->
                            <a class="btn btn-primary" href="/show?id=<?= $posts[0]['id'] ?>">Read more →</a>
                        </div>
                    </div>

                    <?php if (count($posts) > 1) : ?>
                        <!-- Nested row for non-featured blog posts-->
                        <div class="row row-cols-1 row-cols-sm-2">
                            <?php foreach (array_slice($posts, 1) as $post) : ?>
                                <div class="">
                                    <!-- Blog post-->
                                    <div class="card mb-4"><a href="/show?id=<?= $post['id'] ?>"><img class="card-img-top" src="/images/<?= $post['image'] ?>" alt="Post Title"></a>
                                        <div class="card-body">
                                            <div class="small text-muted"><?= date("F j, Y", strtotime($post['updated_at'])); ?></div>
                                            <h2 class="card-title h4"><?= $post['title']; ?></h2>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p> -->
                                            <a class="btn btn-primary" href="/show?id=<?= $post['id'] ?>">Read more →</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endif; ?>

        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">About Site</div>
                <div class="card-body">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse iusto, natus excepturi consequatur maxime aliquid vero numquam recusandae facere tenetur nostrum, dicta eaque accusamus? Dolor excepturi expedita totam minima. Maiores esse, exercitationem illum magnam est molestias quaerat, necessitatibus quod eum culpa consectetur deleniti ipsam tempore nulla debitis atque laboriosam! Fuga.</div>
            </div>
        </div>
    </div>
</div>

<?php require './components/footer.php' ?>