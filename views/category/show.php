<?php

use App\Connection;
use App\Model\Category;
use App\Model\Post;
use App\URL;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$query = $pdo->prepare("SELECT * FROM category WHERE id = :id");
$query->execute(['id' => $id]);
$query->setFetchMode(PDO::FETCH_CLASS, Category::class);
$category = $query->fetch();

if ($category === false) {
    throw new Exception('Aucun category ne correspond a cet ID');
}

if ($category->getSlug() !== $slug) {
    $url = $router->url('category', ['slug' => $category->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$query = $pdo->prepare("SELECT c.id, c.slug, c.name 
FROM post_category pc JOIN category c on c.id = pc.category_id 
WHERE  pc.category_id = :id");
$query->execute(['id' => $category->getID()]);
$query->setFetchMode(PDO::FETCH_CLASS, Category::class);
$categories = $query->fetchAll();

$title = "catégorie - {$category->getName()}";



$currentPage = URL::getPositiveInt('page', 1);

$count = (int)$pdo->query('SELECT COUNT(category_id) FROM post_category WHERE category_id = ' . $category->getID())
                  ->fetch(PDO::FETCH_NUM)[0];
$perPage = 12;
$pages = ceil($count / $perPage);
if ($currentPage > $pages) {
    throw new Exception('Cette page n\'existe pas');
}
$offset = $perPage * ($currentPage - 1);
$query = $pdo->query("SELECT p.* FROM post p JOIN post_category pc on pc.post_id = p.id  WHERE pc.category_id = {$category->getID()} ORDER BY created_at DESC LIMIT $perPage OFFSET $offset ");
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class);

$link = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
?>



<section class="section-header bg-primary text-white pb-10 pb-sm-8 pb-lg-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 cl-md-8 text-center"><h1 class="display-2 mb-4"><?= e($title)?></h1>
                <p class="lead">We help you get better at SEO and marketing: detailed tutorials, case studies and
                    opinion pieces from marketing practitioners and industry experts alike</p></div>
        </div>
    </div>
</section>
<section class="section section-lg line-bottom-light ">
    <div class="container mt-n10 mt-lg-n12 z-2 ">
        <div class="row mb-4">
            <?= require dirname(__DIR__) . '/post/card.php'?>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if ($currentPage > 1): ?>
                            <?php $l = $link;
                            if ($currentPage > 2) {
                                $l = $link . '?page=' . ($currentPage - 1);
                            }
                            ?>
                            <li class="page-item"><a class="page-link" href="<?= $l ?>">Page précédente</a></li>
                        <?php endif ?>

                        <?php if ($currentPage < $pages): ?>
                            <li class="page-item"><a class="page-link" href="<?= $link?>?page=<?= $currentPage + 1 ?>">Page suivantes</a></li>
                        <?php endif ?>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</section>
</main>
