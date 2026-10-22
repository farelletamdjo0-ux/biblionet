<h1 class="h3 mb-3">Catalogue</h1>
<form class="row g-2 mb-3" method="get" action="<?= BASE_URL ?>/catalogue">
  <div class="col-md-10"><input name="q" class="form-control" placeholder="Rechercher un titre ou un auteur" value="<?= e($q) ?>"></div>
  <div class="col-md-2"><button class="btn btn-outline-primary w-100">Rechercher</button></div>
</form>
<table class="table table-bordered bg-white align-middle">
  <thead><tr><th>Titre</th><th>Auteur</th><th>Catégorie</th><th>Année</th><th>Statut</th></tr></thead>
  <tbody>
  <?php if (!$livres): ?>
    <tr><td colspan="5">Aucun livre trouvé.</td></tr>
  <?php endif; ?>
  <?php foreach ($livres as $l): ?>
    <tr>
      <td><?= e($l['titre']) ?></td>
      <td><?= e($l['auteur']) ?></td>
      <td><?= e($l['categorie']) ?></td>
      <td><?= e($l['annee']) ?></td>
      <td><?php if ($l['disponibles'] > 0): ?>
            <span class="badge bg-success">Disponible</span>
          <?php else: ?>
            <span class="badge bg-danger">Indisponible</span>
          <?php endif; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
