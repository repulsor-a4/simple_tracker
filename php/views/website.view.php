<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/websites" class="text-blue-500 underline">go back...</a>
        </p>

        <p>Website: <a href="#" class="text-blue-500 underline"><?= $website['website_url'] ?></a></p>
        <p>Website Trakcing Code: <?= $website['website_code'] ?></p>
    </div>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($website_unique_visits as $unique_visit) : ?>
            <li>
                <?= $unique_visit['id'] ?>,
                <?= $unique_visit['ip_address'] ?>,
                <?= $unique_visit['page_name'] ?>,
                <?= $unique_visit['timestamp'] ?>
            </li>
        <?php endforeach; ?>
    </div>
</main>

<?php require('partials/footer.php') ?>