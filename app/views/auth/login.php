<div class="row justify-content-center">
  <div class="col-md-4">
    <h1 class="h4 mb-3">Connexion bibliothécaire</h1>
    <?php if ($error): ?><div class="alert alert-danger"><?= e($error) ?></div><?php endif; ?>
    <form method="post" action="<?= BASE_URL ?>/auth/login" class="bg-white p-4 rounded border">
      <div class="mb-3"><label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" required></div>
      <button class="btn btn-primary w-100">Se connecter</button>
    </form>
  </div>
</div>
