<?php

use App\Connection;
use App\Model\Category;
use App\Model\Post;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$query = $pdo->prepare("SELECT * FROM post WHERE id = :id");
$query->execute(['id' => $id]);
$query->setFetchMode(PDO::FETCH_CLASS, Post::class);
$post = $query->fetch();

if ($post === false) {
    throw new Exception('Aucun article ne correspond a cet ID');
}

if ($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$query = $pdo->prepare("SELECT c.id, c.slug, c.name FROM post_category pc JOIN category c on c.id = pc.category_id WHERE  pc.post_id = :id");
$query->execute(['id' => $post->getID()]);
$query->setFetchMode(PDO::FETCH_CLASS, Category::class);
$categories = $query->fetchAll();


?>
<section class="section-header pb-5 pb-sm-7 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 text-center">
                <div class="mb-4">
                    <?php foreach ($categories as $category):?>
                    <a href="<?= $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()])?>" class="badge bg-success me-3 px-2"><?= $category->getName()?></a>
                    <?php endforeach ?>
                </div>
                <h1 class="display-3 mb-4 px-lg-5"><?= $post->getName() ?></h1>
                <div class="post-meta"><span class="fw-bold me-3">James Curran</span> <span class="post-date me-3"> <?= $post->getCreatedAt()->format('d F Y') ?></span>
                    <span class="fw-bold">7 min read</span></div>
            </div>
        </div>
    </div>
</section>
<div class="section section-sm bg-white pt-5 pt-lg-6 text-black">
    <article class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8"><p><?= $post->getFormattedContent() ?></p>
            </div>
        </div>
        <div class="row justify-content-sm-center align-items-center py-3 mt-3">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-9 col-md-6"><h6 class="fw-bolder d-inline mb-0 me-3">Share:</h6>
                        <button class="btn btn-sm me-2 btn-icon-only btn-pill btn-twitter d-inline text-white"
                                aria-label="twitter social link"><span class="fab fa-twitter"></span></button>
                        <button class="btn btn-sm me-2 btn-icon-only btn-pill btn-facebook d-inline"
                                aria-label="facebook social link"><span class="fab fa-facebook-f"></span></button>
                        <button class="btn btn-sm btn-icon-only btn-pill bg-orange d-inline text-white"
                                aria-label="reddit social link"><span class="fab fa-reddit-alien"></span></button>
                    </div>
                    <div class="col-3 col-md-6 text-right"><span class="far fa-bookmark text-primary"
                                                                 data-bs-toggle="tooltip" data-bs-placement="top"
                                                                 title="Bookmark story"
                                                                 data-original-title="Bookmark story"></span></div>
                </div>
            </div>
        </div>
    </article>
</div>
