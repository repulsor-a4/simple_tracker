<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($websites as $website) : ?>
            <li>
                <a href="/website?id=<?= $website['id'] ?>" class="text-blue-500 hover:underline">
                    <?= $website['website_url'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </div>
</main>

<?php require('partials/footer.php') ?>