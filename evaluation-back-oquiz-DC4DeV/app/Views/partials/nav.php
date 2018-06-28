<nav>
    <!-- Premier menu -->
    <div class="menu">


            <div class="login p-3 menu-hover">
                <a href="<?= $router->generate('main_home')?>">
                <h1>O'Quiz</h1></a>
            </div>
            <?php if($connectedUser !== false) : ?>
            <div class="login p-3 menu-hover">
                <a href="<?= $router->generate('user_profile')?>">
                <i class="fas fa-user"></i>
                &nbsp;Mon Compte</a>
            </div>

            <div class="inscription p-3 menu-hover">
                <a href="<?= $router->generate('user_logout')?>">
                <i class="fas fa-sign-out-alt"></i>
                &nbsp;Deconnexion</a>
            </div>

            <?php else :?>
            <div class="login p-3 menu-hover">
                <a href="<?= $router->generate('user_login')?>">
                <i class="fas fa-sign-in-alt"></i>
                &nbsp;Connexion</a>
            </div>

            <div class="inscription p-3 menu-hover">
                <a href="<?= $router->generate('user_signup')?>">
                <i class="fas fa-edit"></i>
                &nbsp;Inscription</a>
            </div>
            <?php endif; ?>



    </div>
    <!-- Second menu -->

</nav>
