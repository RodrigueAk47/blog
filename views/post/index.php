<?php

use App\Connection;
use App\Model\Category;
use App\Model\Post;
use App\PaginatedQuery;

$title = 'Blog';

$pdo = Connection::getPDO();

$paginatedQuery = new PaginatedQuery(
    "SELECT * FROM post ORDER BY created_at DESC",
    "SELECT COUNT(id) FROM post",
);
$posts = $paginatedQuery->getItems(Post::class);
$postsByID = [];
foreach ($posts as $post) {
    $postsByID[$post->getID()] = $post;
}

$categories = $pdo
    ->query('SELECT c.*, pc.post_id 
                      FROM post_category pc JOIN category c 
                      on c.id = pc.category_id 
                      WHERE pc.post_id IN (' . implode(',', array_keys($postsByID)) . ')'
    )->fetchAll(PDO::FETCH_CLASS, Category::class);
foreach ($categories as $category) {
    $postsByID[$category->getPostID()]->addCategory($category);
}
$link = $router->url('home');
?>


<section class="section-header bg-primary text-white pb-10 pb-sm-8 pb-lg-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 cl-md-8 text-center">
                <h1 class="display-2 mb-4">Our Blog</h1>
                <p class="lead">We help you get better at SEO and marketing:
                    detailed tutorials, case studies and
                    opinion pieces from marketing practitioners and industry
                    experts alike</p>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg line-bottom-light ">
    <div class="container mt-n10 mt-lg-n12 z-2 ">
        <div class="row mb-4">
            <?= require 'card.php' ?>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?= $paginatedQuery->previousLink($link) ?>
                        <?= $paginatedQuery->nextLink($link) ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
</main>
