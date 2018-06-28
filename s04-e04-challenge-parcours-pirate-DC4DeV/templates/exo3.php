<h2>Exo 3</h2>

<?php if ($_final): ?>
  <p class="alert alert-success">Yeah !</p>
<?php else: ?>
  <p class="alert alert-danger">Pas bon...</p>
<?php endif; ?>

<div class="row">
  <form action="index.php" method="post">
    <input type="hidden" name="secret" value="<?=$_SESSION['randomized']?>">
    <div class="form-group">
      <label for="">Nom d'utilisateur</label>
      <input
        type="text"
        name="username"
        value="<?= $user?>"
        class="form-control"
        placeholder="Login"
        autocomplete="off"
      />
    </div>

    <div class="form-group">
      <label for="">Mot de passe</label>
      <input
        type="password"
        name="password"
        value="<?= $pass?>"
        class="form-control"
        placeholder="Password"
        autocomplete="off"
      />
    </div>

    <button type="submit" name="button">S'identifier</button>
  </form>
</div>
