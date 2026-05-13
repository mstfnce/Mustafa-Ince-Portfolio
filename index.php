<?php
$pageTitle = 'Mustafa Ince - Software Developer';

// Load database connection.
require __DIR__ . '/includes/db.php';

// Fetch projects from the database.
$stmt = $pdo->query('SELECT * FROM projects ORDER BY sort_order ASC');
$projects = $stmt->fetchAll();

// Include the shared header.
require __DIR__ . '/includes/header.php';
?>

<!-- HERO -->
<section class="hero" id="hero">
  <div class="hero-content">
    <div class="hero-eyebrow">
      <span class="eyebrow-line"></span>
      <span class="eyebrow-text">Software Developer - Istanbul</span>
    </div>

    <h1 class="hero-title">
      <span class="title-line reveal-line">Mustafa</span>
      <span class="title-line reveal-line italic-accent">Ince<span class="title-dot">.</span></span>
    </h1>

    <div class="hero-sub">
      <p class="hero-desc">
        I build modern digital experiences<br />
        from interface to database layer.
      </p>
      <div class="hero-actions">
        <button class="scroll-btn" id="scrollBtn">
          <span>Explore</span>
          <span class="scroll-arrow">↓</span>
        </button>
        <div class="hero-stats">
          <div class="stat">
            <span class="stat-num" data-target="9">0</span>
            <span class="stat-label">Technologies</span>
          </div>
          <div class="stat-divider"></div>
          <div class="stat">
            <span class="stat-num" data-target="<?= count($projects) > 0 ? count($projects) : 6 ?>">0</span>
            <span class="stat-label">Projects</span>
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
    <span class="label-text">About</span>
  </div>

  <div class="about-grid">
    <div class="about-image-col">
      <div class="image-wrapper">
        <div class="image-border-frame">
          <img src="assets/img/profile.svg" alt="Mustafa Ince profile visual" id="profile-pic" />
        </div>
        <div class="image-tag">
          <span class="tag-mono">Mustafa Ince</span>
          <span class="tag-sub">Software Developer</span>
        </div>
      </div>
    </div>

    <div class="about-text-col">
      <h2 class="about-heading">
        I turn complex problems<br /><em>into elegant solutions.</em>
      </h2>
      <p class="about-body">
        Hi, I am Mustafa. I design user-focused and performance-oriented
        digital experiences with a strong interest in software development.
        I keep improving my full-stack skills through every new project.
      </p>

      <div class="specs-grid">
        <div class="spec-item">
          <span class="spec-key">Education</span>
          <span class="spec-val">Software Engineering - 3rd Grade</span>
        </div>
        <div class="spec-item">
          <span class="spec-key">Focus</span>
          <span class="spec-val">Full-Stack Web Development</span>
        </div>
        <div class="spec-item">
          <span class="spec-key">Location</span>
          <span class="spec-val">Istanbul, Turkey</span>
        </div>
        <div class="spec-item">
          <span class="spec-key">Status</span>
          <span class="spec-val status-available">
            <span class="status-pulse"></span>
            Open to New Projects
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
    <span class="label-text">Skills</span>
  </div>

  <div class="skills-header">
    <h2 class="skills-heading">Technology <em>Stack</em></h2>
    <p class="skills-sub">Core systems connected to my development workflow.</p>
  </div>

  <div class="skills-layout">
    <div class="network-wrap">
      <div class="network-container">
        <div class="core-node">
          <span class="core-label">FS</span>
          <div class="core-ring"></div>
        </div>
        <div class="skill-node node-1" data-skill="Python">PY</div>
        <div class="skill-node node-2" data-skill="C++ / C#">C++</div>
        <div class="skill-node node-3" data-skill="Java (Android)">JAVA</div>
        <div class="skill-node node-4" data-skill="SQL Database">SQL</div>
        <div class="skill-node node-5" data-skill="React.js">RCT</div>
        <div class="skill-node node-6" data-skill="HTML / CSS">WEB</div>
        <div class="skill-node node-7" data-skill="OOP Principles">OOP</div>
        <div class="skill-node node-8" data-skill="ASP.NET Core">.NET</div>
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
          <div class="skill-bar-item">
            <div class="bar-header"><span>ASP.NET Core</span><span>72%</span></div>
            <div class="bar-track">
              <div class="bar-fill" data-width="72"></div>
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
    <span class="label-text">Projects</span>
  </div>

  <div class="projects-header">
    <h2 class="projects-heading">Completed <em>Work</em></h2>
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
          <h3 class="project-name">Projects could not be loaded</h3>
          <p class="project-desc">When the database connection is available, records from the projects table will be listed here.
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
    <span class="label-text">Contact</span>
  </div>

  <div class="contact-inner">
    <h2 class="contact-heading">
      Let's build something<br /><em>together.</em>
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
          <input class="form-input" type="text" name="name" placeholder="Full Name" required />
          <input class="form-input" type="email" name="email" placeholder="Email" required />
          <input class="form-input" type="text" name="subject" placeholder="Subject" required />
          <textarea class="form-input form-textarea" name="message" placeholder="Message" required></textarea>
          <button class="form-submit" type="submit">
            <span>Send</span>
            <span class="btn-arrow">↗</span>
          </button>
          <p class="form-status" id="contactStatus" aria-live="polite"></p>
        </form>
      </div>

      <div class="contact-details">
        <div class="detail-row">
          <span class="detail-key">Email</span>
          <a href="mailto:mustafancee.52@gmail.com" class="detail-val">mustafancee.52@gmail.com</a>
        </div>
        <div class="detail-row">
          <span class="detail-key">Phone</span>
          <span class="detail-val">+90 541 568 11 98</span>
        </div>
        <div class="detail-row">
          <span class="detail-key">Location</span>
          <span class="detail-val">Istanbul, Turkey</span>
        </div>
        <div class="system-status">
          <span class="status-indicator"></span>
          <span class="status-text">System Ready - Deployment Available</span>
        </div>
      </div>

      <aside class="contact-aside" aria-label="Work information">
        <div class="availability-panel">
          <span class="panel-kicker">Available For</span>
          <h3>Internship & junior developer roles</h3>
          <p>I can contribute to full-stack web, Android, backend logic, and database-focused projects.</p>
        </div>

        <div class="contact-metrics">
          <div class="metric-item">
            <span class="metric-num">24h</span>
            <span class="metric-label">Average reply</span>
          </div>
          <div class="metric-item">
            <span class="metric-num">8</span>
            <span class="metric-label">GitHub projects</span>
          </div>
          <div class="metric-item">
            <span class="metric-num">TR/EN</span>
            <span class="metric-label">Communication</span>
          </div>
        </div>

        <div class="workflow-list">
          <span class="panel-kicker">Focus Areas</span>
          <ul>
            <li>PHP, MySQL, JavaScript</li>
            <li>ASP.NET Core MVC</li>
            <li>React & API integrations</li>
            <li>Java Android applications</li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
