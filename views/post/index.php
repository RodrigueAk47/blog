<?php

use App\Connection;
use App\Model\Post;
use App\URL;

$title = 'Blog';

$pdo = Connection::getPDO();


$currentPage = URL::getPositiveInt('page', 1);

$count = (int)$pdo->query('SELECT COUNT(id) FROM post')->fetch(PDO::FETCH_NUM)[0];
$perPage = 12;
$pages = ceil($count / $perPage);
if ($currentPage > $pages) {
    throw new Exception('Cette page n\'existe pas');
}
$offset = $perPage * ($currentPage - 1);
$query = $pdo->query("SELECT * FROM post ORDER BY created_at DESC LIMIT $perPage OFFSET $offset");
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class);


?>


<section class="section-header bg-primary text-white pb-10 pb-sm-8 pb-lg-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 cl-md-8 text-center"><h1 class="display-2 mb-4">Our Blog</h1>
                <p class="lead">We help you get better at SEO and marketing: detailed tutorials, case studies and
                    opinion pieces from marketing practitioners and industry experts alike</p></div>
        </div>
    </div>
</section>
<section class="section section-lg line-bottom-light ">
    <div class="container mt-n10 mt-lg-n12 z-2 ">
        <div class="row mb-4">
           <?= require 'card.php'?>
        </div>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php if ($currentPage > 1): ?>
                            <?php $link = $router->url('home');
                                    if ($currentPage > 2) {
                                        $link .= '?page=' . ($currentPage - 1);
                                    }
                            ?>
                            <li class="page-item"><a class="page-link" href="<?= $link ?>">Page précédente</a></li>
                            <?php endif ?>

                            <?php if ($currentPage < $pages): ?>
                                <li class="page-item"><a class="page-link" href="<?= $router->url('home')?>?page=<?= $currentPage + 1 ?>">Page suivantes</a></li>
                            <?php endif ?>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
</section>
</main>
