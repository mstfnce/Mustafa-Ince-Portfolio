import ContactForm from "@/components/contact/ContactForm";

// Ported from the CONTACT section of index.php. Social links + details + aside
// are static; the form is an interactive Client Component.
export default function Contact() {
  return (
    <section id="contact" className="contact-section section">
      <div className="section-label">
        <span className="label-num">04 -</span>
        <span className="label-text">Contact</span>
      </div>

      <div className="contact-inner">
        <h2 className="contact-heading">
          Let&apos;s build something
          <br />
          <em>together.</em>
        </h2>

        <div className="contact-body">
          <div className="contact-channels">
            <a
              href="https://www.linkedin.com/in/mustafa-ince-3b3b2a300"
              target="_blank"
              rel="noopener"
              className="channel-link"
            >
              <span className="channel-icon">in</span>
              <span className="channel-label">LinkedIn</span>
              <span className="channel-arrow">↗</span>
            </a>
            <a
              href="https://github.com/mstfnce"
              target="_blank"
              rel="noopener"
              className="channel-link"
            >
              <span className="channel-icon">gh</span>
              <span className="channel-label">GitHub</span>
              <span className="channel-arrow">↗</span>
            </a>
            <a
              href="https://instagram.com/mustafa.ie"
              target="_blank"
              rel="noopener"
              className="channel-link"
            >
              <span className="channel-icon">ig</span>
              <span className="channel-label">Instagram</span>
              <span className="channel-arrow">↗</span>
            </a>

            <ContactForm />
          </div>

          <div className="contact-details">
            <div className="detail-row">
              <span className="detail-key">Email</span>
              <a href="mailto:mustafancee.52@gmail.com" className="detail-val">
                mustafancee.52@gmail.com
              </a>
            </div>
            <div className="detail-row">
              <span className="detail-key">Phone</span>
              <span className="detail-val">+90 541 568 11 98</span>
            </div>
            <div className="detail-row">
              <span className="detail-key">Location</span>
              <span className="detail-val">Istanbul, Turkey</span>
            </div>
            <div className="system-status">
              <span className="status-indicator"></span>
              <span className="status-text">
                System Ready - Deployment Available
              </span>
            </div>
          </div>

          <aside className="contact-aside" aria-label="Work information">
            <div className="availability-panel">
              <span className="panel-kicker">Available For</span>
              <h3>Internship &amp; junior developer roles</h3>
              <p>
                I can contribute to full-stack web, Android, backend logic, and
                database-focused projects.
              </p>
            </div>

            <div className="contact-metrics">
              <div className="metric-item">
                <span className="metric-num">24h</span>
                <span className="metric-label">Average reply</span>
              </div>
              <div className="metric-item">
                <span className="metric-num">8</span>
                <span className="metric-label">GitHub projects</span>
              </div>
              <div className="metric-item">
                <span className="metric-num">TR/EN</span>
                <span className="metric-label">Communication</span>
              </div>
            </div>

            <div className="workflow-list">
              <span className="panel-kicker">Focus Areas</span>
              <ul>
                <li>PHP, MySQL, JavaScript</li>
                <li>ASP.NET Core MVC</li>
                <li>React &amp; API integrations</li>
                <li>Java Android applications</li>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </section>
  );
}
