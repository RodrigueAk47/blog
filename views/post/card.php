<?php foreach ($posts as $post): ?>

    <div class="col-12 col-md-6 col-lg-4  mb-4 ">
        <div class="card shadow text-center ">
            <div class="card-header bg-white border-0 pb-0">
                <span class="card-text small">
                    <span class="far fa-calendar-alt me-2"></span>
                        <?= $post->getCreatedAt()->format('d F Y') ?> ::
                    <?php foreach ($post->getCategories() as $k => $category): ?>
                        <a href="<?= $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]) ?>"
                           class="badge bg-success me-3 px-2"><?= $category->getName() ?></a>
                    <?php endforeach ?>
                </span>
            </div>
            <div class="card-body">
                <h3 class="h5 card-title"><?= $post->getName() ?></h3>
                <p class="card-text"><?= $post->getExcerpt() ?></p>
                <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>"
                   class="btn btn-primary btn-sm">Voir plus</a>
            </div>
        </div>
    </div>
<?php endforeach ?>