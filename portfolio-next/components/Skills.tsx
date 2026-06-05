// Ported from the SKILLS section of index.php. Node tooltip + skill-bar fill
// animations are driven by ScrollEffects (.skill-node / .bar-fill selectors).
export default function Skills() {
  return (
    <section id="skills" className="skills-section section">
      <div className="section-label">
        <span className="label-num">02 -</span>
        <span className="label-text">Skills</span>
      </div>

      <div className="skills-header">
        <h2 className="skills-heading">
          Technology <em>Stack</em>
        </h2>
        <p className="skills-sub">
          Core systems connected to my development workflow.
        </p>
      </div>

      <div className="skills-layout">
        <div className="network-wrap">
          <div className="network-container">
            <div className="core-node">
              <span className="core-label">FS</span>
              <div className="core-ring"></div>
            </div>
            <div className="skill-node node-1" data-skill="Python">
              PY
            </div>
            <div className="skill-node node-2" data-skill="C++ / C#">
              C++
            </div>
            <div className="skill-node node-3" data-skill="Java (Android)">
              JAVA
            </div>
            <div className="skill-node node-4" data-skill="SQL Database">
              SQL
            </div>
            <div className="skill-node node-5" data-skill="React.js">
              RCT
            </div>
            <div className="skill-node node-6" data-skill="HTML / CSS">
              WEB
            </div>
            <div className="skill-node node-7" data-skill="OOP Principles">
              OOP
            </div>
            <div className="skill-node node-8" data-skill="ASP.NET Core">
              .NET
            </div>
          </div>
          <div className="skill-tooltip" id="skillTooltip"></div>
        </div>

        <div className="skills-list-wrap">
          <div className="skill-category">
            <h3 className="cat-title">Backend &amp; Logic</h3>
            <div className="skill-bars">
              {[
                ["Python", 85],
                ["Java", 80],
                ["C++ / C#", 70],
                ["SQL", 75],
                ["ASP.NET Core", 72],
              ].map(([label, width]) => (
                <div className="skill-bar-item" key={label}>
                  <div className="bar-header">
                    <span>{label}</span>
                    <span>{width}%</span>
                  </div>
                  <div className="bar-track">
                    <div className="bar-fill" data-width={width}></div>
                  </div>
                </div>
              ))}
            </div>
          </div>
          <div className="skill-category">
            <h3 className="cat-title">Frontend &amp; UI</h3>
            <div className="skill-bars">
              {[
                ["JavaScript", 90],
                ["React.js", 82],
                ["HTML / CSS", 95],
              ].map(([label, width]) => (
                <div className="skill-bar-item" key={label}>
                  <div className="bar-header">
                    <span>{label}</span>
                    <span>{width}%</span>
                  </div>
                  <div className="bar-track">
                    <div className="bar-fill" data-width={width}></div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
