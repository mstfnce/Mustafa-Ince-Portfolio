<!doctype html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($pageTitle ?? 'Mustafa İnce - Software Developer', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=DM+Mono:wght@300;400;500&family=Syne:wght@400;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="noise-overlay"></div>

    <header class="main-header" id="header">
      <div class="logo">
        <span class="logo-bracket">[</span>
        <span class="logo-text">MI</span>
        <span class="logo-bracket">]</span>
      </div>
      <nav class="nav-links">
        <a href="#about" class="nav-item" data-index="01">Hakkımda</a>
        <a href="#skills" class="nav-item" data-index="02">Beceriler</a>
        <a href="#projects" class="nav-item" data-index="03">Projeler</a>
        <a href="#contact" class="nav-item" data-index="04">İletişim</a>
      </nav>
      <a href="assets/cv/mustafa-ince-cv.html" class="resume-btn" target="_blank" rel="noopener">
        <span>CV Görüntüle</span>
        <span class="btn-arrow">↗</span>
      </a>
    </header>
