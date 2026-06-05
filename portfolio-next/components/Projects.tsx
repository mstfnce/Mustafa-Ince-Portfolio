import { isSafeProjectUrl, type Project } from "@/lib/projects";

// Ported from the PROJECTS section of index.php. Cards are server-rendered
// directly from the static project list (no AJAX, no DB). Card hover-tilt is
// handled by ScrollEffects (.project-card selector). JSX auto-escapes content,
// so the old escapeHtml() helper is not needed.
export default function Projects({ projects }: { projects: Project[] }) {
  return (
    <section id="projects" className="projects-section section">
      <div className="section-label">
        <span className="label-num">03 -</span>
        <span className="label-text">Projects</span>
      </div>

      <div className="projects-header">
        <h2 className="projects-heading">
          Completed <em>Work</em>
        </h2>
      </div>

      <div className="projects-grid" id="projectsGrid">
        {projects.length > 0 ? (
          projects.map((project, index) => {
            const cardClass = project.is_featured
              ? "project-card featured"
              : "project-card";
            const projectUrl = isSafeProjectUrl(project.project_url)
              ? project.project_url
              : "";

            return (
              <div
                className={cardClass}
                data-num={String(index + 1).padStart(2, "0")}
                key={`${project.title}-${index}`}
              >
                <div className="project-inner">
                  <div className="project-top">
                    <span className="project-tag">{project.tag}</span>
                    <span className={`project-tech ${project.tech_class}`}>
                      {project.tech}
                    </span>
                  </div>
                  <h3 className="project-name">{project.title}</h3>
                  <p className="project-desc">{project.description}</p>
                  <div className="project-bottom">
                    {projectUrl !== "" ? (
                      <a
                        href={projectUrl}
                        className="project-arrow"
                        target="_blank"
                        rel="noopener"
                      >
                        →
                      </a>
                    ) : (
                      <span className="project-arrow">→</span>
                    )}
                  </div>
                </div>
              </div>
            );
          })
        ) : (
          <div className="project-card" data-num="00">
            <div className="project-inner">
              <div className="project-top">
                <span className="project-tag">System</span>
                <span className="project-tech js-dot">DB</span>
              </div>
              <h3 className="project-name">Projects could not be loaded</h3>
              <p className="project-desc">
                When project data is available, records will be listed here.
              </p>
              <div className="project-bottom">
                <span className="project-arrow">→</span>
              </div>
            </div>
          </div>
        )}
      </div>
    </section>
  );
}
