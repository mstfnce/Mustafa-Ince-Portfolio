<?php
session_start();

if (empty($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <main class="admin-auth">
      <section class="admin-card">
        <h1>Dashboard</h1>
        <p class="admin-copy">Hoş geldin, <?= htmlspecialchars($_SESSION['admin_username'] ?? 'admin', ENT_QUOTES, 'UTF-8') ?>.</p>
        <p class="admin-copy">Session kontrolü aktif. Bu sayfa sadece giriş yapan admin tarafından görülebilir.</p>
        <a class="form-submit" href="logout.php">
          <span>Çıkış Yap</span>
          <span class="btn-arrow">↗</span>
        </a>
      </section>
    </main>
  </body>
</html>
