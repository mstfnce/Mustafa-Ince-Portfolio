/**
 * MUSTAFA INCE - PORTFOLIO CORE ENGINE
 * Version: 2.0 - Editorial Noir Build
 */

document.addEventListener("DOMContentLoaded", () => {
  // ==========================================
  // 1. DEVELOPER DATA
  // ==========================================
  const developerName = "Mustafa Ince";
  const currentTitle = "Software Developer";

  const techSkills = [
    "Python",
    "C++",
    "Java",
    "JavaScript",
    "SQL",
    "React",
    "HTML/CSS",
    "OOP",
    ".NET",
  ];

  const devProfile = {
    name: developerName,
    role: currentTitle,
    mission: "Building modern digital experiences",
    skillsCount: techSkills.length,
    projectCount: 8,
    isSystemReady: true,
  };

  // ==========================================
  // 2. HEADER SCROLL STATE
  // ==========================================
  const header = document.getElementById("header");
  const logoAdminTrigger = document.getElementById("logoAdminTrigger");
  let logoClickCount = 0;
  let logoClickTimer;

  logoAdminTrigger?.addEventListener("click", () => {
    logoClickCount += 1;
    clearTimeout(logoClickTimer);

    if (logoClickCount >= 5) {
      window.location.href = "admin/login.php";
      return;
    }

    logoClickTimer = setTimeout(() => {
      logoClickCount = 0;
    }, 1500);
  });

  window.addEventListener(
    "scroll",
    () => {
      if (window.scrollY > 60) {
        header?.classList.add("scrolled");
      } else {
        header?.classList.remove("scrolled");
      }
    },
    { passive: true },
  );

  // ==========================================
  // 3. SMOOTH SCROLL — HERO BUTTON
  // ==========================================
  const scrollBtn = document.getElementById("scrollBtn");
  const aboutSection = document.querySelector("#about");

  scrollBtn?.addEventListener("click", () => {
    aboutSection?.scrollIntoView({ behavior: "smooth" });
  });

  // Nav links smooth scroll
  document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener("click", (e) => {
      const target = document.querySelector(link.getAttribute("href"));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth" });
      }
    });
  });

  // ==========================================
  // 4. COUNTER ANIMATION — HERO STATS
  // ==========================================
  function animateCounter(el, target, duration = 1400) {
    let start = 0;
    const step = (timestamp) => {
      if (!start) start = timestamp;
      const progress = Math.min((timestamp - start) / duration, 1);
      // Ease out quad
      const eased = 1 - Math.pow(1 - progress, 3);
      el.textContent = Math.floor(eased * target);
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = target;
    };
    requestAnimationFrame(step);
  }

  const counterEls = document.querySelectorAll(".stat-num[data-target]");
  let countersStarted = false;

  // ==========================================
  // 5. INTERSECTION OBSERVER — REVEAL & BARS
  // ==========================================
  const revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          revealObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15 },
  );

  // Mark elements for reveal
  const revealTargets = document.querySelectorAll(
    ".about-grid, .skills-layout, .project-card, .contact-body, .specs-grid, .image-wrapper",
  );
  revealTargets.forEach((el, i) => {
    el.classList.add("reveal");
    el.style.transitionDelay = `${i * 0.08}s`;
    revealObserver.observe(el);
  });

  // Skill bars observer
  const barObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.querySelectorAll(".bar-fill").forEach((bar, i) => {
            const w = bar.dataset.width;
            setTimeout(() => {
              bar.style.width = w + "%";
            }, i * 120);
          });
          barObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.3 },
  );

  const skillsLayout = document.querySelector(".skills-layout");
  if (skillsLayout) barObserver.observe(skillsLayout);

  // Hero counter observer
  const heroObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !countersStarted) {
          countersStarted = true;
          counterEls.forEach((el, i) => {
            setTimeout(() => {
              animateCounter(el, parseInt(el.dataset.target));
            }, i * 200);
          });
          heroObserver.disconnect();
        }
      });
    },
    { threshold: 0.5 },
  );

  const heroStats = document.querySelector(".hero-stats");
  if (heroStats) heroObserver.observe(heroStats);

  // ==========================================
  // 6. SKILL NODE TOOLTIP
  // ==========================================
  const skillNodes = document.querySelectorAll(".skill-node");
  const tooltip = document.getElementById("skillTooltip");

  skillNodes.forEach((node) => {
    node.addEventListener("mouseenter", () => {
      if (tooltip) {
        tooltip.textContent = node.dataset.skill;
        tooltip.style.opacity = "1";
      }
    });
    node.addEventListener("mouseleave", () => {
      if (tooltip) tooltip.style.opacity = "0";
    });
  });

  // ==========================================
  // 7. PROJECTS — AJAX LOAD & CARD HOVER
  // ==========================================
  const projectsGrid = document.getElementById("projectsGrid");

  function escapeHtml(value) {
    return String(value ?? "")
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;");
  }

  function bindProjectCardHover() {
    document.querySelectorAll(".project-card").forEach((card) => {
      if (card.dataset.hoverBound === "true") return;
      card.dataset.hoverBound = "true";

      card.addEventListener("mousemove", (e) => {
        const rect = card.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        const deltaX = ((e.clientX - centerX) / rect.width) * 6;
        const deltaY = ((e.clientY - centerY) / rect.height) * 6;
        card.style.transform = `perspective(800px) rotateX(${-deltaY}deg) rotateY(${deltaX}deg) translateZ(4px)`;
      });
      card.addEventListener("mouseleave", () => {
        card.style.transform = "";
      });
    });
  }

  function renderProjectCard(project, index) {
    const cardClass = Number(project.is_featured) === 1
      ? "project-card featured"
      : "project-card";
    const projectUrl = project.project_url || "";
    const arrow = projectUrl
      ? `<a href="${escapeHtml(projectUrl)}" class="project-arrow" target="_blank" rel="noopener">→</a>`
      : '<span class="project-arrow">→</span>';

    return `
      <div class="${cardClass}" data-num="${String(index + 1).padStart(2, "0")}">
        <div class="project-inner">
          <div class="project-top">
            <span class="project-tag">${escapeHtml(project.tag)}</span>
            <span class="project-tech ${escapeHtml(project.tech_class)}">${escapeHtml(project.tech)}</span>
          </div>
          <h3 class="project-name">${escapeHtml(project.title)}</h3>
          <p class="project-desc">${escapeHtml(project.description)}</p>
          <div class="project-bottom">${arrow}</div>
        </div>
      </div>
    `;
  }

  async function loadProjectsWithAjax() {
    if (!projectsGrid) return;

    try {
      const response = await fetch("api/projects.php");
      const result = await response.json();

      if (!result.success || !Array.isArray(result.projects)) return;

      projectsGrid.innerHTML = result.projects
        .map((project, index) => renderProjectCard(project, index))
        .join("");

      bindProjectCardHover();
    } catch (error) {
      console.warn("Projects could not be loaded with AJAX.", error);
    }
  }

  bindProjectCardHover();
  loadProjectsWithAjax();

  // ==========================================
  // 8. ACTIVE NAV HIGHLIGHT ON SCROLL
  // ==========================================
  const sections = document.querySelectorAll("section[id]");
  const navItems = document.querySelectorAll(".nav-item");

  const navObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const id = entry.target.getAttribute("id");
          navItems.forEach((item) => {
            item.style.color =
              item.getAttribute("href") === `#${id}` ? "var(--gold)" : "";
          });
        }
      });
    },
    { threshold: 0.5 },
  );

  sections.forEach((s) => navObserver.observe(s));

  // ==========================================
  // 9. CONTACT FORM — AJAX SUBMIT
  // ==========================================
  const contactForm = document.getElementById("contactForm");
  const contactStatus = document.getElementById("contactStatus");

  function showContactStatus(message, type = "") {
    if (!contactStatus) return;
    contactStatus.textContent = message;
    contactStatus.className = type ? `form-status ${type}` : "form-status";
  }

  function validateContactForm(formData) {
    const name = (formData.get("name") || "").trim();
    const email = (formData.get("email") || "").trim();
    const subject = (formData.get("subject") || "").trim();
    const message = (formData.get("message") || "").trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!name || !email || !subject || !message) {
      return "Please fill in all fields.";
    }

    if (name.length < 3) {
      return "Full name must be at least 3 characters.";
    }

    if (!emailPattern.test(email)) {
      return "Please enter a valid email address.";
    }

    if (subject.length < 3) {
      return "Subject must be at least 3 characters.";
    }

    if (message.length < 10) {
      return "Message must be at least 10 characters.";
    }

    return "";
  }

  contactForm?.addEventListener("submit", async (e) => {
    e.preventDefault();

    const submitBtn = contactForm.querySelector(".form-submit");
    const formData = new FormData(contactForm);
    const validationError = validateContactForm(formData);

    if (validationError) {
      showContactStatus(validationError, "error");
      return;
    }

    showContactStatus("Sending...");
    submitBtn?.setAttribute("disabled", "disabled");

    try {
      const response = await fetch("contact.php", {
        method: "POST",
        body: formData,
      });

      const result = await response.json();

      showContactStatus(
        result.message || "Request completed.",
        result.success ? "success" : "error",
      );

      if (result.success) {
        contactForm.reset();
      }
    } catch (error) {
      showContactStatus(
        "Connection error. Please try again.",
        "error",
      );
    } finally {
      submitBtn?.removeAttribute("disabled");
    }
  });

  // ==========================================
  // 10. CONSOLE SIGNATURE
  // ==========================================
  console.clear();
  console.log(
    "%c MUSTAFA INCE PORTFOLIO ",
    "background:#c8a96e;color:#0a0a0a;font-weight:bold;font-size:14px;padding:6px 12px;",
  );
  console.log(
    `%cDeveloper:%c ${devProfile.name}`,
    "color:#c8a96e",
    "color:#f0ede8",
  );
  console.log(
    `%cRole:%c      ${devProfile.role}`,
    "color:#c8a96e",
    "color:#f0ede8",
  );
  console.log(
    `%cStatus:%c    ${devProfile.isSystemReady ? "✓ ONLINE" : "✗ OFFLINE"}`,
    "color:#c8a96e",
    "color:#4ade80;font-weight:bold",
  );
  console.log(
    `%cSkills:%c    ${devProfile.skillsCount} nodes active`,
    "color:#c8a96e",
    "color:#888",
  );
  console.log(
    `%cProjects:%c  ${devProfile.projectCount} deployed`,
    "color:#c8a96e",
    "color:#888",
  );
});
