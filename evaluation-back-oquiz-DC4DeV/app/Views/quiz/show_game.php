<?php $this->layout('layout_registered') ?>

<script>var ID_QUIZ="<?= $currentQuiz->getId() ?>";</script>

<div class="container">
    <h2><?= $currentQuiz->getTitle()?></h2>
    <h6 class="card-subtitle mb-2 text-muted">By <?= $quizList[$currentQuiz->getId()-1]->first_name?>&nbsp;<?= $quizList[$currentQuiz->getId()-1]->last_name?></h6>
</div>

<div class="container cards">
    <div id="score" class="alert-success" style="display:none"></div>

    <form action="" method="post" id="formQuiz">

        <button id="submit" type="submit" value="<?= $currentQuiz->getId() ?>" class="btn btn-primary container-fluid ">Valider</button>
        <button id="reGame" type="submit" value="<?= $currentQuiz->getId() ?>" class="btn btn-primary container-fluid" style="display:none">Rejouer</button>
        <div id="<?= $currentQuiz->getId() ?>" class="container d-flex justify-content-between flex-wrap">

        <?php foreach ($questions as $question): ?>
            <div class="col-md-3 box-content question" id="<?= $question->getId()?>">
                <div class="card-header">
                    <span class="taglevel <?= $question->getLevel()?>"><?= $question->getLevel()?></span>
                    <p class="card-title"><?= $question->getQuestion()?></p>
                </div>

                <div class="card-body">
                    <ul class=" ">
                        <li class="<?= $question->getProp1()?>"><input id="<?= $question->getId()?><?= $question->getProp1()?>" type="radio" name="<?= $question->getId()?>" value="<?= $question->getProp1()?>">
                            <label for="<?= $question->getId()?><?= $question->getProp1()?>"><p class="card-text"><?= $question->getProp1()?></p></label></li>

                        <li class="<?= $question->getProp2()?>"><input id="<?= $question->getId()?><?= $question->getProp2()?>"type="radio" name="<?= $question->getId()?>" value="<?= $question->getProp2()?>">
                            <label for="<?= $question->getId()?><?= $question->getProp2()?>"><p class="card-text"><?= $question->getProp2()?></p></label></li>

                        <li class="<?= $question->getProp3()?>"><input id="<?= $question->getId()?><?= $question->getProp3()?>"type="radio" name="<?= $question->getId()?>" value="<?= $question->getProp3()?>">
                            <label for="<?= $question->getId()?><?= $question->getProp3()?>"><p class="card-text"><?= $question->getProp3()?></p></label></li>

                        <li class="<?= $question->getProp4()?>"><input id="<?= $question->getId()?><?= $question->getProp4()?>"type="radio" name="<?= $question->getId()?>" value="<?= $question->getProp4()?>">
                            <label for="<?= $question->getId()?><?= $question->getProp4()?>"><p class="card-text"><?= $question->getProp4()?></p></label></li>
                    </ul>
                </div>
                
                <div class="card-footer text-muted ">
                    <div class="wiki none"><p class="cite"><?= $question->getAnecdote()?></p><a href="#" class="link">Wikipedia (<?= $question->getWiki()?>)</a></div>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
    </form>
</div>
