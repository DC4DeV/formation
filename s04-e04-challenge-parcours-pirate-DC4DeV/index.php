<?php
include('inc/functions.php');
include('exos/exo1.php');
include('exos/exo2.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Parcours du hacker !</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container">
      <h1>
        Hissez ho, bande de forbans !
        <small class="text-muted">Et une bouteille de rhum !</small>
      </h1>

      <!-- Exercice 1 -->
      <h2>Exo 1</h2>
      <?php include('templates/exo1.php') ?>

      <!-- Exercice 2 -->
      <h2>Exo 2</h2>
      <?php include('templates/exo2.php') ?>

      <!-- Exercice 3 -->
      <?php include('exos/exo3.php'); ?>
    </div>
  </body>
</html>
