<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioNet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>/">BiblioNet</a>
        <div class="navbar-nav">
            <a class="nav-link" href="<?= BASE_URL ?>/catalogue">Catalogue</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="nav-link" href="<?= BASE_URL ?>/livres">Livres</a>
                <a class="nav-link" href="<?= BASE_URL ?>/adherents">Adhérents</a>
                <a class="nav-link" href="<?= BASE_URL ?>/emprunts">Emprunts</a>
                <a class="nav-link" href="<?= BASE_URL ?>/auth/logout">Déconnexion</a>
            <?php else: ?>
                <a class="nav-link" href="<?= BASE_URL ?>/auth/login">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<main class="container">
    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert alert-info"><?= e($_SESSION['flash']) ?></div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <?= $content ?>
</main>
</body>
</html>
