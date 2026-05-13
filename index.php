<?php
$pageTitle = 'Mustafa İnce - Software Developer';

// Veritabanı bağlantısını çağırıyoruz.
require __DIR__ . '/includes/db.php';

// projects tablosundaki projeleri sırasına göre çekiyoruz.
$stmt = $pdo->query('SELECT * FROM projects ORDER BY sort_order ASC');
$projects = $stmt->fetchAll();

// Header bölümünü sayfaya dahil ediyoruz.
require __DIR__ . '/includes/header.php';
?>

<!-- HERO -->
<section class="hero" id="hero">
  <div class="hero-bg-text" aria-hidden="true">DEV</div>

  <div class="hero-content">
    <div class="hero-eyebrow">
      <span class="eyebrow-line"></span>
      <span class="eyebrow-text">Software Developer - İstanbul</span>
    </div>

    <h1 class="hero-title">
      <span class="title-line reveal-line">Mustafa</span>
      <span class="title-line reveal-line italic-accent">İnce<span class="title-dot">.</span></span>
    </h1>

    <div class="hero-sub">
      <p class="hero-desc">
        İnternetin temel katmanlarından başlayarak<br />
        modern dijital deneyimler inşa ediyorum.
      </p>
      <div class="hero-actions">
        <button class="scroll-btn" id="scrollBtn">
          <span>Keşfet</span>
          <span class="scroll-arrow">↓</span>
        </button>
        <div class="hero-stats">
          <div class="stat">
            <span class="stat-num" data-target="9">0</span>
            <span class="stat-label">Teknoloji</span>
          </div>
          <div class="stat-divider"></div>
          <div class="stat">
            <span class="stat-num" data-target="<?= count($projects) > 0 ? count($projects) : 6 ?>">0</span>
            <span class="stat-label">Proje</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-visual">
    <div class="visual-frame">
      <div class="frame-corner tl"></div>
      <div class="frame-corner tr"></div>
      <div class="frame-corner bl"></div>
      <div class="frame-corner br"></div>
      <div class="visual-inner">
        <svg viewBox="0 0 400 400" class="hero-svg" xmlns="http://www.w3.org/2000/svg">
          <circle cx="200" cy="200" r="170" fill="none" stroke="rgba(200,169,110,0.08)" stroke-width="1"
            stroke-dasharray="4 8" class="ring ring-1" />
          <circle cx="200" cy="200" r="130" fill="none" stroke="rgba(200,169,110,0.12)" stroke-width="0.5"
            class="ring ring-2" />
          <circle cx="200" cy="200" r="90" fill="none" stroke="rgba(200,169,110,0.2)" stroke-width="1"
            stroke-dasharray="2 6" class="ring ring-3" />
          <circle cx="200" cy="200" r="55" fill="url(#heroGrad)" class="orb-glow" />
          <text x="200" y="212" font-family="'Playfair Display', serif" font-size="36" fill="white" text-anchor="middle"
            class="orb-text">{ }</text>
          <circle cx="200" cy="30" r="5" fill="#c8a96e" class="orbit-dot d1" />
          <circle cx="370" cy="200" r="4" fill="#c8a96e" opacity="0.6" class="orbit-dot d2" />
          <circle cx="200" cy="370" r="6" fill="#c8a96e" opacity="0.4" class="orbit-dot d3" />
          <circle cx="30" cy="200" r="3" fill="#c8a96e" opacity="0.8" class="orbit-dot d4" />
          <text x="200" y="22" font-family="'DM Mono', monospace" font-size="9" fill="rgba(200,169,110,0.7)"
            text-anchor="middle">JavaScript</text>
          <text x="385" y="204" font-family="'DM Mono', monospace" font-size="9" fill="rgba(200,169,110,0.5)"
            text-anchor="start">React</text>
          <text x="200" y="388" font-family="'DM Mono', monospace" font-size="9" fill="rgba(200,169,110,0.4)"
            text-anchor="middle">Python</text>
          <text x="0" y="204" font-family="'DM Mono', monospace" font-size="9" fill="rgba(200,169,110,0.6)"
            text-anchor="start">Java</text>
          <defs>
            <radialGradient id="heroGrad" cx="50%" cy="30%" r="70%">
              <stop offset="0%" stop-color="#2a1f0a" />
              <stop offset="100%" stop-color="#0d0d0d" />
            </radialGradient>
          </defs>
        </svg>
      </div>
      <div class="visual-caption">
        <span class="caption-mono">v2.0</span>
        <span class="caption-dot"></span>
        <span class="caption-mono">CORE ENGINE</span>
      </div>
    </div>
  </div>

  <div class="hero-scroll-indicator">
    <div class="scroll-line"></div>
    <span class="scroll-label">scroll</span>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="about-section section">
  <div class="section-label">
    <span class="label-num">01 -</span>
    <span class="label-text">Hakkımda</span>
  </div>

  <div class="about-grid">
    <div class="about-image-col">
      <div class="image-wrapper">
        <div class="image-border-frame">
          <img src="assets/img/profile.svg" alt="Mustafa İnce profil görseli" id="profile-pic" />
        </div>
        <div class="image-tag">
          <span class="tag-mono">Mustafa İnce</span>
          <span class="tag-sub">Software Developer</span>
        </div>
      </div>
    </div>

    <div class="about-text-col">
      <h2 class="about-heading">
        Karmaşık problemleri<br /><em>zarif çözümlere</em> dönüştürüyorum.
      </h2>
      <p class="about-body">
        Merhaba! Ben Mustafa. Yazılım dünyasına olan tutkumla, kullanıcı
        odaklı ve performans öncelikli deneyimler tasarlıyorum. Web
        teknolojileri üzerine uzmanlaşırken her yeni projede kendimi bir
        adım daha ileriye taşıyorum.
      </p>

      <div class="specs-grid">
        <div class="spec-item">
          <span class="spec-key">Eğitim</span>
          <span class="spec-val">Yazılım Mühendisliği - 3. Sınıf</span>
        </div>
        <div class="spec-item">
          <span class="spec-key">Uzmanlık</span>
          <span class="spec-val">Full-Stack Web Development</span>
        </div>
        <div class="spec-item">
          <span class="spec-key">Konum</span>
          <span class="spec-val">İstanbul, Türkiye</span>
        </div>
        <div class="spec-item">
          <span class="spec-key">Durum</span>
          <span class="spec-val status-available">
            <span class="status-pulse"></span>
            Yeni Projelere Açık
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SKILLS -->
<section id="skills" class="skills-section section">
  <div class="section-label">
    <span class="label-num">02 -</span>
    <span class="label-text">Beceriler</span>
  </div>

  <div class="skills-header">
    <h2 class="skills-heading">Teknoloji <em>Yığını</em></h2>
    <p class="skills-sub">Ana işlem çekirdeğine entegre sistemler.</p>
  </div>

  <div class="skills-layout">
    <div class="network-wrap">
      <div class="network-container">
        <div class="core-node">
          <span class="core-label">JS</span>
          <div class="core-ring"></div>
        </div>
        <div class="skill-node node-1" data-skill="Python">PY</div>
        <div class="skill-node node-2" data-skill="C++ / C#">C++</div>
        <div class="skill-node node-3" data-skill="Java (Android)">JAVA</div>
        <div class="skill-node node-4" data-skill="SQL Database">SQL</div>
        <div class="skill-node node-5" data-skill="React.js">RCT</div>
        <div class="skill-node node-6" data-skill="HTML / CSS">WEB</div>
        <div class="skill-node node-7" data-skill="Algorithms & DSA">DSA</div>
        <div class="skill-node node-8" data-skill="OOP Principles">OOP</div>
      </div>
      <div class="skill-tooltip" id="skillTooltip"></div>
    </div>

    <div class="skills-list-wrap">
      <div class="skill-category">
        <h3 class="cat-title">Backend & Logic</h3>
        <div class="skill-bars">
          <div class="skill-bar-item">
            <div class="bar-header"><span>Python</span><span>85%</span></div>
            <div class="bar-track">
              <div class="bar-fill" data-width="85"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="bar-header"><span>Java</span><span>80%</span></div>
            <div class="bar-track">
              <div class="bar-fill" data-width="80"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="bar-header"><span>C++ / C#</span><span>70%</span></div>
            <div class="bar-track">
              <div class="bar-fill" data-width="70"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="bar-header"><span>SQL</span><span>75%</span></div>
            <div class="bar-track">
              <div class="bar-fill" data-width="75"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="skill-category">
        <h3 class="cat-title">Frontend & UI</h3>
        <div class="skill-bars">
          <div class="skill-bar-item">
            <div class="bar-header"><span>JavaScript</span><span>90%</span></div>
            <div class="bar-track">
              <div class="bar-fill" data-width="90"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="bar-header"><span>React.js</span><span>82%</span></div>
            <div class="bar-track">
              <div class="bar-fill" data-width="82"></div>
            </div>
          </div>
          <div class="skill-bar-item">
            <div class="bar-header"><span>HTML / CSS</span><span>95%</span></div>
            <div class="bar-track">
              <div class="bar-fill" data-width="95"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROJECTS -->
<section id="projects" class="projects-section section">
  <div class="section-label">
    <span class="label-num">03 -</span>
    <span class="label-text">Projeler</span>
  </div>

  <div class="projects-header">
    <h2 class="projects-heading">Tamamlanan <em>Görevler</em></h2>
  </div>

  <div class="projects-grid" id="projectsGrid">
    <?php if ($projects): ?>
      <?php foreach ($projects as $index => $project): ?>
        <?php
        $cardClass = !empty($project['is_featured']) ? 'project-card featured' : 'project-card';
        $projectUrl = $project['project_url'] ?? '';
        ?>
        <div class="<?= htmlspecialchars($cardClass) ?>" data-num="<?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?>">
          <div class="project-inner">
            <div class="project-top">
              <span class="project-tag"><?= htmlspecialchars($project['tag']) ?></span>
              <span
                class="project-tech <?= htmlspecialchars($project['tech_class']) ?>"><?= htmlspecialchars($project['tech']) ?></span>
            </div>
            <h3 class="project-name"><?= htmlspecialchars($project['title']) ?></h3>
            <p class="project-desc"><?= htmlspecialchars($project['description']) ?></p>
            <div class="project-bottom">
              <?php if ($projectUrl !== ''): ?>
                <a href="<?= htmlspecialchars($projectUrl) ?>" class="project-arrow" target="_blank" rel="noopener">→</a>
              <?php else: ?>
                <span class="project-arrow">→</span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="project-card" data-num="00">
        <div class="project-inner">
          <div class="project-top">
            <span class="project-tag">System</span>
            <span class="project-tech js-dot">DB</span>
          </div>
          <h3 class="project-name">Projeler yüklenemedi</h3>
          <p class="project-desc">Veritabanı bağlantısı kurulduğunda projects tablosundaki kayıtlar burada listelenecek.
          </p>
          <div class="project-bottom">
            <span class="project-arrow">→</span>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- CONTACT -->
<section id="contact" class="contact-section section">
  <div class="section-label">
    <span class="label-num">04 -</span>
    <span class="label-text">İletişim</span>
  </div>

  <div class="contact-inner">
    <h2 class="contact-heading">
      Birlikte bir şeyler<br /><em>inşa edelim.</em>
    </h2>

    <div class="contact-body">
      <div class="contact-channels">
        <a href="https://www.linkedin.com/in/mustafa-ince-3b3b2a300" target="_blank" class="channel-link">
          <span class="channel-icon">in</span>
          <span class="channel-label">LinkedIn</span>
          <span class="channel-arrow">↗</span>
        </a>
        <a href="https://github.com/mstfnce" target="_blank" class="channel-link">
          <span class="channel-icon">gh</span>
          <span class="channel-label">GitHub</span>
          <span class="channel-arrow">↗</span>
        </a>
        <a href="https://instagram.com/mustafa.ie" target="_blank" class="channel-link">
          <span class="channel-icon">ig</span>
          <span class="channel-label">Instagram</span>
          <span class="channel-arrow">↗</span>
        </a>

        <form class="contact-form" id="contactForm" method="post">
          <input class="form-input" type="text" name="name" placeholder="Ad Soyad" required />
          <input class="form-input" type="email" name="email" placeholder="E-posta" required />
          <input class="form-input" type="text" name="subject" placeholder="Konu" required />
          <textarea class="form-input form-textarea" name="message" placeholder="Mesaj" required></textarea>
          <button class="form-submit" type="submit">
            <span>Gönder</span>
            <span class="btn-arrow">↗</span>
          </button>
          <p class="form-status" id="contactStatus" aria-live="polite"></p>
        </form>
      </div>

      <div class="contact-details">
        <div class="detail-row">
          <span class="detail-key">E-posta</span>
          <a href="mailto:mustafancee.52@gmail.com" class="detail-val">mustafancee.52@gmail.com</a>
        </div>
        <div class="detail-row">
          <span class="detail-key">Telefon</span>
          <span class="detail-val">+90 541 568 11 98</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Konum</span>
          <span class="detail-val">İstanbul, Türkiye</span>
        </div>
        <div class="system-status">
          <span class="status-indicator"></span>
          <span class="status-text">System Ready - Deployment Available</span>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
