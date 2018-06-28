<div class="container d-flex justify-content-between flex-wrap">
<?php foreach ($quizList as $quiz): ?>
    <div class="col-md-3 box-content question">
        <div class="card-header ">
            <h3 class="card-title"><?= $quiz->getTitle() ?></h3>
            <h6 class="card-subtitle mb-2 text-muted">by <?= $quiz->first_name?>&nbsp;<?= $quiz->last_name?></h6>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $quiz->getDescription()?></p>
        </div>
        <div class="card-footer text-muted ">
            <a href="<?= $router->generate('quiz_show', ['id' => $quiz->getId()]) ?>" class="btn btn-primary">Accéder</a>
        </div>
    </div>
<?php endforeach; ?>
</div>
