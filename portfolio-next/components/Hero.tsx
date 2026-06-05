// Ported from the HERO section of index.php. Counter animation is driven by
// ScrollEffects (targets .stat-num[data-target]).
export default function Hero({ projectCount }: { projectCount: number }) {
  const projectsTarget = projectCount > 0 ? projectCount : 6;

  return (
    <section className="hero" id="hero">
      <div className="hero-content">
        <div className="hero-eyebrow">
          <span className="eyebrow-line"></span>
          <span className="eyebrow-text">Software Developer - Istanbul</span>
        </div>

        <h1 className="hero-title">
          <span className="title-line reveal-line">Mustafa</span>
          <span className="title-line reveal-line italic-accent">
            Ince<span className="title-dot">.</span>
          </span>
        </h1>

        <div className="hero-sub">
          <p className="hero-desc">
            I build modern digital experiences
            <br />
            from interface to database layer.
          </p>
          <div className="hero-actions">
            <button className="scroll-btn" id="scrollBtn">
              <span>Explore</span>
              <span className="scroll-arrow">↓</span>
            </button>
            <div className="hero-stats">
              <div className="stat">
                <span className="stat-num" data-target="9">
                  0
                </span>
                <span className="stat-label">Technologies</span>
              </div>
              <div className="stat-divider"></div>
              <div className="stat">
                <span className="stat-num" data-target={projectsTarget}>
                  0
                </span>
                <span className="stat-label">Projects</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="hero-visual">
        <div className="visual-frame">
          <div className="frame-corner tl"></div>
          <div className="frame-corner tr"></div>
          <div className="frame-corner bl"></div>
          <div className="frame-corner br"></div>
          <div className="visual-inner">
            <svg
              viewBox="0 0 400 400"
              className="hero-svg"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle
                cx="200"
                cy="200"
                r="170"
                fill="none"
                stroke="rgba(200,169,110,0.08)"
                strokeWidth="1"
                strokeDasharray="4 8"
                className="ring ring-1"
              />
              <circle
                cx="200"
                cy="200"
                r="130"
                fill="none"
                stroke="rgba(200,169,110,0.12)"
                strokeWidth="0.5"
                className="ring ring-2"
              />
              <circle
                cx="200"
                cy="200"
                r="90"
                fill="none"
                stroke="rgba(200,169,110,0.2)"
                strokeWidth="1"
                strokeDasharray="2 6"
                className="ring ring-3"
              />
              <circle
                cx="200"
                cy="200"
                r="55"
                fill="url(#heroGrad)"
                className="orb-glow"
              />
              <text
                x="200"
                y="212"
                fontFamily="'Playfair Display', serif"
                fontSize="36"
                fill="white"
                textAnchor="middle"
                className="orb-text"
              >
                {"{ }"}
              </text>
              <circle
                cx="200"
                cy="30"
                r="5"
                fill="#c8a96e"
                className="orbit-dot d1"
              />
              <circle
                cx="370"
                cy="200"
                r="4"
                fill="#c8a96e"
                opacity="0.6"
                className="orbit-dot d2"
              />
              <circle
                cx="200"
                cy="370"
                r="6"
                fill="#c8a96e"
                opacity="0.4"
                className="orbit-dot d3"
              />
              <circle
                cx="30"
                cy="200"
                r="3"
                fill="#c8a96e"
                opacity="0.8"
                className="orbit-dot d4"
              />
              <text
                x="200"
                y="22"
                fontFamily="'DM Mono', monospace"
                fontSize="9"
                fill="rgba(200,169,110,0.7)"
                textAnchor="middle"
              >
                JavaScript
              </text>
              <text
                x="385"
                y="204"
                fontFamily="'DM Mono', monospace"
                fontSize="9"
                fill="rgba(200,169,110,0.5)"
                textAnchor="start"
              >
                React
              </text>
              <text
                x="200"
                y="388"
                fontFamily="'DM Mono', monospace"
                fontSize="9"
                fill="rgba(200,169,110,0.4)"
                textAnchor="middle"
              >
                Python
              </text>
              <text
                x="0"
                y="204"
                fontFamily="'DM Mono', monospace"
                fontSize="9"
                fill="rgba(200,169,110,0.6)"
                textAnchor="start"
              >
                Java
              </text>
              <defs>
                <radialGradient id="heroGrad" cx="50%" cy="30%" r="70%">
                  <stop offset="0%" stopColor="#2a1f0a" />
                  <stop offset="100%" stopColor="#0d0d0d" />
                </radialGradient>
              </defs>
            </svg>
          </div>
          <div className="visual-caption">
            <span className="caption-mono">v2.0</span>
            <span className="caption-dot"></span>
            <span className="caption-mono">CORE ENGINE</span>
          </div>
        </div>
      </div>

      <div className="hero-scroll-indicator">
        <div className="scroll-line"></div>
        <span className="scroll-label">scroll</span>
      </div>
    </section>
  );
}
