<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Livres</h1>
  <a class="btn btn-primary" href="<?= BASE_URL ?>/livres/create">+ Ajouter</a>
</div>
<table class="table table-bordered bg-white align-middle">
  <thead><tr><th>Titre</th><th>Auteur</th><th>Catégorie</th><th>Année</th><th>Exemplaires</th><th>Disponibles</th><th></th></tr></thead>
  <tbody>
  <?php foreach ($livres as $l): ?>
    <tr>
      <td><?= e($l['titre']) ?></td>
      <td><?= e($l['auteur']) ?></td>
      <td><?= e($l['categorie']) ?></td>
      <td><?= e($l['annee']) ?></td>
      <td><?= e($l['nb_exemplaires']) ?></td>
      <td><?= e($l['disponibles']) ?></td>
      <td class="text-nowrap">
        <a class="btn btn-sm btn-outline-secondary" href="<?= BASE_URL ?>/livres/edit/<?= (int) $l['id'] ?>">Modifier</a>
        <form class="d-inline" method="post" action="<?= BASE_URL ?>/livres/delete/<?= (int) $l['id'] ?>" onsubmit="return confirm('Supprimer ce livre ?')">
          <button class="btn btn-sm btn-outline-danger">Supprimer</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
