<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Emprunts en cours</h1>
  <a class="btn btn-primary" href="<?= BASE_URL ?>/emprunts/create">+ Nouvel emprunt</a>
</div>
<table class="table table-bordered bg-white align-middle">
  <thead><tr><th>Livre</th><th>Adhérent</th><th>Date d'emprunt</th><th></th></tr></thead>
  <tbody>
  <?php if (!$emprunts): ?>
    <tr><td colspan="4">Aucun emprunt en cours.</td></tr>
  <?php endif; ?>
  <?php foreach ($emprunts as $row): ?>
    <tr>
      <td><?= e($row['titre']) ?></td>
      <td><?= e($row['prenom'] . ' ' . $row['nom']) ?></td>
      <td><?= e($row['date_emprunt']) ?></td>
      <td>
        <form method="post" action="<?= BASE_URL ?>/emprunts/retour/<?= (int) $row['id'] ?>">
          <button class="btn btn-sm btn-outline-success">Retour</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
