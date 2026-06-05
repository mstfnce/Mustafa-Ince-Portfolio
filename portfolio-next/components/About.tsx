// Ported from the ABOUT section of index.php.
export default function About() {
  return (
    <section id="about" className="about-section section">
      <div className="section-label">
        <span className="label-num">01 -</span>
        <span className="label-text">About</span>
      </div>

      <div className="about-grid">
        <div className="about-image-col">
          <div className="image-wrapper">
            <div className="image-border-frame">
              {/* Static SVG asset served from /public — plain img keeps the
                  original markup and avoids next/image config. */}
              {/* eslint-disable-next-line @next/next/no-img-element */}
              <img
                src="/img/profile.svg"
                alt="Mustafa Ince profile visual"
                id="profile-pic"
              />
            </div>
            <div className="image-tag">
              <span className="tag-mono">Mustafa Ince</span>
              <span className="tag-sub">Software Developer</span>
            </div>
          </div>
        </div>

        <div className="about-text-col">
          <h2 className="about-heading">
            I turn complex problems
            <br />
            <em>into elegant solutions.</em>
          </h2>
          <p className="about-body">
            Hi, I am Mustafa. I design user-focused and performance-oriented
            digital experiences with a strong interest in software development.
            I keep improving my full-stack skills through every new project.
          </p>

          <div className="specs-grid">
            <div className="spec-item">
              <span className="spec-key">Education</span>
              <span className="spec-val">Software Engineering - 3rd Grade</span>
            </div>
            <div className="spec-item">
              <span className="spec-key">Focus</span>
              <span className="spec-val">Full-Stack Web Development</span>
            </div>
            <div className="spec-item">
              <span className="spec-key">Location</span>
              <span className="spec-val">Istanbul, Turkey</span>
            </div>
            <div className="spec-item">
              <span className="spec-key">Status</span>
              <span className="spec-val status-available">
                <span className="status-pulse"></span>
                Open to New Projects
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
