<?php $this->layout('layout') ?>

<div class="container">
    <h2><?= $currentQuiz->getTitle()?></h2>
    <h6 class="card-subtitle mb-2 text-muted">By <?= $quizList[$currentQuiz->getId()-1]->first_name?>&nbsp;<?= $quizList[$currentQuiz->getId()-1]->last_name?></h6>
    <h3>Vous devez vous connecter pour jouer.</h3>

</div>

<div class="container">
    <div class="container d-flex justify-content-between flex-wrap">
    <?php foreach ($questions as $question): ?>
        <div class="col-3 col-md-3 box-content question">
            <div class="card-header">
                <span class="taglevel <?= $question->getLevel()?>"><?= $question->getLevel()?></span>
                <p class="card-title"><?= $question->getQuestion()?></p>
            </div>
            <div class="card-body">
                <ul class=" ">
                    <li class=""><p class="card-text"><?= $question->getProp1()?></p></li>

                    <li class=""><p class="card-text"><?= $question->getProp2()?></p></li>

                    <li class=""><p class="card-text"><?= $question->getProp3()?></p></li>

                    <li class=""><p class="card-text"><?= $question->getProp4()?></p></li>
                </ul>
            </div>
            <div class="card-footer text-muted ">
                <a href="<?= $router->generate('user_login') ?>" class="btn btn-primary">Se Connecter</a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
