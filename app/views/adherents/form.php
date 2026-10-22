<h1 class="h3 mb-3"><?= $adherent ? 'Modifier l\'adhérent' : 'Ajouter un adhérent' ?></h1>
<form method="post" action="<?= BASE_URL ?>/<?= e($action) ?>" class="bg-white p-4 rounded border" style="max-width:600px">
  <div class="row">
    <div class="col mb-3"><label class="form-label">Nom</label>
      <input name="nom" class="form-control" required value="<?= e($adherent['nom'] ?? '') ?>"></div>
    <div class="col mb-3"><label class="form-label">Prénom</label>
      <input name="prenom" class="form-control" required value="<?= e($adherent['prenom'] ?? '') ?>"></div>
  </div>
  <div class="row">
    <div class="col mb-3"><label class="form-label">Classe</label>
      <input name="classe" class="form-control" value="<?= e($adherent['classe'] ?? '') ?>"></div>
    <div class="col mb-3"><label class="form-label">Téléphone</label>
      <input name="telephone" class="form-control" value="<?= e($adherent['telephone'] ?? '') ?>"></div>
  </div>
  <button class="btn btn-primary">Enregistrer</button>
  <a class="btn btn-link" href="<?= BASE_URL ?>/adherents">Annuler</a>
</form>
