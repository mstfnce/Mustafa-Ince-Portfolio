<?php
session_start();

if (empty($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

require __DIR__ . '/../includes/db.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function redirectWith(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
    header('Location: dashboard.php');
    exit;
}

$errors = [];
$editingProject = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrfToken = $_POST['csrf_token'] ?? '';

    if (!hash_equals($_SESSION['csrf_token'], $csrfToken)) {
        redirectWith('error', 'Security verification failed.');
    }

    $action = $_POST['action'] ?? '';

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);

        if ($id > 0) {
            $stmt = $pdo->prepare('DELETE FROM projects WHERE id = ?');
            $stmt->execute([$id]);
            redirectWith('success', 'Project deleted.');
        }

        redirectWith('error', 'Project to delete could not be found.');
    }

    if ($action === 'delete_message') {
        $id = (int) ($_POST['id'] ?? 0);

        if ($id > 0) {
            $stmt = $pdo->prepare('DELETE FROM messages WHERE id = ?');
            $stmt->execute([$id]);
            redirectWith('success', 'Message deleted.');
        }

        redirectWith('error', 'Message to delete could not be found.');
    }

    if ($action === 'save') {
        $id = (int) ($_POST['id'] ?? 0);
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $tech = trim($_POST['tech'] ?? '');
        $techClass = trim($_POST['tech_class'] ?? '');
        $tag = trim($_POST['tag'] ?? '');
        $projectUrl = trim($_POST['project_url'] ?? '');
        $isFeatured = isset($_POST['is_featured']) ? 1 : 0;
        $sortOrder = (int) ($_POST['sort_order'] ?? 0);

        if ($title === '') {
            $errors[] = 'Project title is required.';
        }

        if ($description === '') {
            $errors[] = 'Project description is required.';
        }

        if ($tech === '') {
            $errors[] = 'Technology field is required.';
        }

        if ($techClass === '') {
            $techClass = 'js-dot';
        }

        if ($tag === '') {
            $tag = 'Public';
        }

        if ($projectUrl !== '' && !filter_var($projectUrl, FILTER_VALIDATE_URL)) {
            $errors[] = 'Project link must be a valid URL.';
        }

        if (!$errors) {
            $projectUrl = $projectUrl !== '' ? $projectUrl : null;

            if ($id > 0) {
                $stmt = $pdo->prepare(
                    'UPDATE projects
                     SET title = ?, description = ?, tech = ?, tech_class = ?, tag = ?, project_url = ?, is_featured = ?, sort_order = ?
                     WHERE id = ?'
                );
                $stmt->execute([$title, $description, $tech, $techClass, $tag, $projectUrl, $isFeatured, $sortOrder, $id]);
                redirectWith('success', 'Project updated.');
            }

            $stmt = $pdo->prepare(
                'INSERT INTO projects (title, description, tech, tech_class, tag, project_url, is_featured, sort_order)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
            );
            $stmt->execute([$title, $description, $tech, $techClass, $tag, $projectUrl, $isFeatured, $sortOrder]);
            redirectWith('success', 'New project added.');
        }

        $editingProject = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'tech' => $tech,
            'tech_class' => $techClass,
            'tag' => $tag,
            'project_url' => $projectUrl,
            'is_featured' => $isFeatured,
            'sort_order' => $sortOrder,
        ];
    }
}

if (isset($_GET['edit']) && $editingProject === null) {
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE id = ?');
    $stmt->execute([(int) $_GET['edit']]);
    $editingProject = $stmt->fetch() ?: null;
}

$projects = $pdo->query('SELECT * FROM projects ORDER BY sort_order ASC, id ASC')->fetchAll();
$messages = $pdo->query('SELECT * FROM messages ORDER BY created_at DESC LIMIT 10')->fetchAll();
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$formProject = $editingProject ?? [
    'id' => 0,
    'title' => '',
    'description' => '',
    'tech' => '',
    'tech_class' => 'js-dot',
    'tag' => 'Public',
    'project_url' => '',
    'is_featured' => 0,
    'sort_order' => count($projects) + 1,
];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <main class="admin-dashboard">
      <header class="admin-topbar">
        <div>
          <span class="admin-kicker">Portfolio Admin</span>
          <h1>Dashboard</h1>
          <p class="admin-copy">Welcome, <?= e($_SESSION['admin_username'] ?? 'admin') ?>. You can manage projects and incoming messages from here.</p>
        </div>
        <div class="admin-actions">
          <a class="admin-link" href="../index.php" target="_blank" rel="noopener">Open Site</a>
          <a class="form-submit" href="logout.php">
            <span>Logout</span>
            <span class="btn-arrow">↗</span>
          </a>
        </div>
      </header>

      <?php if ($flash): ?>
        <p class="admin-alert <?= e($flash['type']) ?>"><?= e($flash['message']) ?></p>
      <?php endif; ?>

      <?php if ($errors): ?>
        <div class="admin-alert error">
          <?php foreach ($errors as $error): ?>
            <p><?= e($error) ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <section class="admin-grid">
        <form class="admin-panel project-form" method="post">
          <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>" />
          <input type="hidden" name="action" value="save" />
          <input type="hidden" name="id" value="<?= (int) $formProject['id'] ?>" />

          <div class="admin-panel-head">
            <span class="admin-kicker"><?= (int) $formProject['id'] > 0 ? 'Edit Project' : 'New Project' ?></span>
            <h2><?= (int) $formProject['id'] > 0 ? 'Edit Project' : 'Add Project' ?></h2>
          </div>

          <label>
            <span>Title</span>
            <input class="form-input" type="text" name="title" value="<?= e($formProject['title']) ?>" required />
          </label>

          <label>
            <span>Description</span>
            <textarea class="form-input form-textarea" name="description" required><?= e($formProject['description']) ?></textarea>
          </label>

          <div class="admin-form-row">
            <label>
              <span>Technology</span>
              <input class="form-input" type="text" name="tech" value="<?= e($formProject['tech']) ?>" placeholder="React" required />
            </label>
            <label>
              <span>CSS Class</span>
              <input class="form-input" type="text" name="tech_class" value="<?= e($formProject['tech_class']) ?>" placeholder="react-dot" />
            </label>
          </div>

          <div class="admin-form-row">
            <label>
              <span>Tag</span>
              <input class="form-input" type="text" name="tag" value="<?= e($formProject['tag']) ?>" placeholder="Featured" />
            </label>
            <label>
              <span>Order</span>
              <input class="form-input" type="number" name="sort_order" value="<?= (int) $formProject['sort_order'] ?>" min="0" />
            </label>
          </div>

          <label>
            <span>Project Link</span>
            <input class="form-input" type="url" name="project_url" value="<?= e($formProject['project_url'] ?? '') ?>" placeholder="https://example.com" />
          </label>

          <label class="admin-check">
            <input type="checkbox" name="is_featured" <?= !empty($formProject['is_featured']) ? 'checked' : '' ?> />
            <span>Featured project</span>
          </label>

          <div class="admin-form-actions">
            <button class="form-submit" type="submit">
              <span><?= (int) $formProject['id'] > 0 ? 'Update' : 'Add' ?></span>
              <span class="btn-arrow">↗</span>
            </button>
            <?php if ((int) $formProject['id'] > 0): ?>
              <a class="admin-link" href="dashboard.php">New project form</a>
            <?php endif; ?>
          </div>
        </form>

        <section class="admin-panel">
          <div class="admin-panel-head">
            <span class="admin-kicker">Projects</span>
            <h2>Project List</h2>
          </div>

          <div class="admin-table-wrap">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Title</th>
                  <th>Technology</th>
                  <th>Tag</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($projects as $project): ?>
                  <tr>
                    <td><?= (int) $project['sort_order'] ?></td>
                    <td><?= e($project['title']) ?></td>
                    <td><?= e($project['tech']) ?></td>
                    <td><?= e($project['tag']) ?></td>
                    <td><?= !empty($project['is_featured']) ? 'Featured' : 'Public' ?></td>
                    <td class="admin-table-actions">
                      <a class="admin-link" href="dashboard.php?edit=<?= (int) $project['id'] ?>">Edit</a>
                      <form method="post" onsubmit="return confirm('Are you sure you want to delete this project?');">
                        <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>" />
                        <input type="hidden" name="action" value="delete" />
                        <input type="hidden" name="id" value="<?= (int) $project['id'] ?>" />
                        <button class="admin-danger" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>
      </section>

      <section class="admin-panel">
        <div class="admin-panel-head">
          <span class="admin-kicker">Messages</span>
          <h2>Latest Contact Messages</h2>
        </div>

        <div class="admin-table-wrap">
          <table class="admin-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($messages): ?>
                <?php foreach ($messages as $message): ?>
                  <tr>
                    <td><?= e($message['name']) ?></td>
                    <td><?= e($message['email']) ?></td>
                    <td><?= e($message['subject']) ?></td>
                    <td><?= e($message['message']) ?></td>
                    <td><?= e($message['created_at']) ?></td>
                    <td>
                      <form method="post" onsubmit="return confirm('Are you sure you want to delete this message?');">
                        <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>" />
                        <input type="hidden" name="action" value="delete_message" />
                        <input type="hidden" name="id" value="<?= (int) $message['id'] ?>" />
                        <button class="admin-danger" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6">No messages yet.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </body>
</html>
