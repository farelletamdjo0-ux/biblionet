<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Adhérents</h1>
  <a class="btn btn-primary" href="<?= BASE_URL ?>/adherents/create">+ Ajouter</a>
</div>
<table class="table table-bordered bg-white align-middle">
  <thead><tr><th>Nom</th><th>Prénom</th><th>Classe</th><th>Téléphone</th><th></th></tr></thead>
  <tbody>
  <?php foreach ($adherents as $a): ?>
    <tr>
      <td><?= e($a['nom']) ?></td>
      <td><?= e($a['prenom']) ?></td>
      <td><?= e($a['classe']) ?></td>
      <td><?= e($a['telephone']) ?></td>
      <td class="text-nowrap">
        <a class="btn btn-sm btn-outline-secondary" href="<?= BASE_URL ?>/adherents/edit/<?= (int) $a['id'] ?>">Modifier</a>
        <form class="d-inline" method="post" action="<?= BASE_URL ?>/adherents/delete/<?= (int) $a['id'] ?>" onsubmit="return confirm('Supprimer cet adhérent ?')">
          <button class="btn btn-sm btn-outline-danger">Supprimer</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
