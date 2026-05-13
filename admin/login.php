<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;

        header('Location: dashboard.php');
        exit;
    }

    $error = 'Kullanici adi veya sifre hatali.';
}
?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Giriş</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <main class="admin-auth">
      <form class="admin-card" method="post">
        <h1>Admin Giriş</h1>
        <?php if ($error !== ''): ?>
          <p class="admin-error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>
        <input class="form-input" type="text" name="username" placeholder="Kullanıcı adı" required />
        <input class="form-input" type="password" name="password" placeholder="Şifre" required />
        <button class="form-submit" type="submit">
          <span>Giriş Yap</span>
          <span class="btn-arrow">↗</span>
        </button>
      </form>
    </main>
  </body>
</html>
