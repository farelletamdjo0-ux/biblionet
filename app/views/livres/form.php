<h1 class="h3 mb-3"><?= $livre ? 'Modifier le livre' : 'Ajouter un livre' ?></h1>
<form method="post" action="<?= BASE_URL ?>/<?= e($action) ?>" class="bg-white p-4 rounded border" style="max-width:600px">
  <div class="mb-3"><label class="form-label">Titre</label>
    <input name="titre" class="form-control" required value="<?= e($livre['titre'] ?? '') ?>"></div>
  <div class="mb-3"><label class="form-label">Auteur</label>
    <input name="auteur" class="form-control" required value="<?= e($livre['auteur'] ?? '') ?>"></div>
  <div class="mb-3"><label class="form-label">Catégorie</label>
    <input name="categorie" class="form-control" value="<?= e($livre['categorie'] ?? '') ?>"></div>
  <div class="row">
    <div class="col mb-3"><label class="form-label">Année</label>
      <input type="number" name="annee" class="form-control" value="<?= e($livre['annee'] ?? '') ?>"></div>
    <div class="col mb-3"><label class="form-label">Nombre d'exemplaires</label>
      <input type="number" min="1" name="nb_exemplaires" class="form-control" value="<?= e($livre['nb_exemplaires'] ?? 1) ?>"></div>
  </div>
  <button class="btn btn-primary">Enregistrer</button>
  <a class="btn btn-link" href="<?= BASE_URL ?>/livres">Annuler</a>
</form>
