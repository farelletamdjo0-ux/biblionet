<h1 class="h3 mb-3">Nouvel emprunt</h1>
<form method="post" action="<?= BASE_URL ?>/emprunts/store" class="bg-white p-4 rounded border" style="max-width:600px">
  <div class="mb-3"><label class="form-label">Livre</label>
    <select name="livre_id" class="form-select" required>
      <option value="">-- Choisir un livre --</option>
      <?php foreach ($livres as $l): ?>
        <option value="<?= (int) $l['id'] ?>" <?= $l['disponibles'] <= 0 ? 'disabled' : '' ?>>
          <?= e($l['titre']) ?> (<?= (int) $l['disponibles'] ?> disponible(s))
        </option>
      <?php endforeach; ?>
    </select></div>
  <div class="mb-3"><label class="form-label">Adhérent</label>
    <select name="adherent_id" class="form-select" required>
      <option value="">-- Choisir un adhérent --</option>
      <?php foreach ($adherents as $a): ?>
        <option value="<?= (int) $a['id'] ?>"><?= e($a['prenom'] . ' ' . $a['nom']) ?> (<?= e($a['classe']) ?>)</option>
      <?php endforeach; ?>
    </select></div>
  <button class="btn btn-primary">Enregistrer l'emprunt</button>
  <a class="btn btn-link" href="<?= BASE_URL ?>/emprunts">Annuler</a>
</form>
