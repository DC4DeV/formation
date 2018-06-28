<?php $this->layout('layout_registered') ?>
<div class="container d-flex align-content-around flex-wrap">
    <div class="col-md-3 box-content card">
        <p>Id : <?= $userModel->getId() ?></p>
        <p>Email : <?= $userModel->getEmail() ?></p>
        <p>Nom : <?= $userModel->getLastname() ?></p>
        <p>Prenom : <?= $userModel->getFirstname() ?></p>

    </div>
<?=$this->insert('quiz/list')?>
</div>
