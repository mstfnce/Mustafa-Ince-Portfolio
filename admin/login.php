<?php
session_start();

require __DIR__ . '/../includes/db.php';

$error = '';
$rememberedUsername = $_COOKIE['admin_username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $rememberMe = isset($_POST['remember_me']);

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;

        if ($rememberMe) {
            setcookie('admin_username', $username, time() + (86400 * 30), '/', '', false, true);
        } else {
            setcookie('admin_username', '', time() - 3600, '/', '', false, true);
        }

        header('Location: dashboard.php');
        exit;
    }

    $error = 'Kullanici adi veya sifre hatali.';
    $rememberedUsername = $username;
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
        <input class="form-input" type="text" name="username" placeholder="Kullanıcı adı" value="<?= htmlspecialchars($rememberedUsername, ENT_QUOTES, 'UTF-8') ?>" required />
        <input class="form-input" type="password" name="password" placeholder="Şifre" required />
        <label class="admin-check">
          <input type="checkbox" name="remember_me" <?= $rememberedUsername !== '' ? 'checked' : '' ?> />
          <span>Kullanıcı adımı hatırla</span>
        </label>
        <button class="form-submit" type="submit">
          <span>Giriş Yap</span>
          <span class="btn-arrow">↗</span>
        </button>
      </form>
    </main>
  </body>
</html>
