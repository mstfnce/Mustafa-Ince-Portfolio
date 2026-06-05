// Ported from includes/header.php. The hidden admin trigger (5 logo clicks) was
// removed — there is no admin panel anymore. Scroll state + active-nav highlight
// are handled by ScrollEffects via the #header / .nav-item selectors.
export default function Header() {
  return (
    <header className="main-header" id="header">
      <a className="logo" href="#hero" aria-label="Portfolio home">
        <span className="logo-bracket">[</span>
        <span className="logo-text">MI</span>
        <span className="logo-bracket">]</span>
      </a>
      <nav className="nav-links">
        <a href="#about" className="nav-item" data-index="01">
          About
        </a>
        <a href="#skills" className="nav-item" data-index="02">
          Skills
        </a>
        <a href="#projects" className="nav-item" data-index="03">
          Projects
        </a>
        <a href="#contact" className="nav-item" data-index="04">
          Contact
        </a>
      </nav>
      <a
        href="/cv/mustafa-ince-cv.html"
        className="resume-btn"
        target="_blank"
        rel="noopener"
      >
        <span>View CV</span>
        <span className="btn-arrow">↗</span>
      </a>
    </header>
  );
}
