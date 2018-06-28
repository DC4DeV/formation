<?php $this->layout('layout') ?>

<div class="container d-flex align-content-around flex-wrap">
    <?php if($connectedUser !== false) : ?>
       <h2>Bienvenue <?= $connectedUser->getFirstname() ?> <?= $connectedUser->getLastname() ?></h2>

  <?php else :?>
      <h2>Bienvenue sur O'quiz</h2>
  <?php endif; ?>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


    <?=$this->insert('quiz/list')?>
</div>
