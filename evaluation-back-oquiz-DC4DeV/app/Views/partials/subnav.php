<nav class="subnav">
<?php if ($connectedUser !== false) : ?>

    <div class="menu">
        <div class="menu-hover"><a href="<?= $router->generate('user_profile') ?>">Bonjour <?= $connectedUser->getFirstname() ?></a></div>
    </div>
<?php endif; ?>
</nav>
