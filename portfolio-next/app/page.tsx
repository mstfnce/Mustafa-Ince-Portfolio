import Hero from "@/components/Hero";
import About from "@/components/About";
import Skills from "@/components/Skills";
import Projects from "@/components/Projects";
import Contact from "@/components/Contact";
import { getProjects } from "@/lib/projects";

// Equivalent of index.php: a Server Component that reads the project list
// (formerly the DB query) and renders all sections. Header/Footer live in the
// root layout.
export default function Home() {
  const projects = getProjects();

  return (
    <>
      <Hero projectCount={projects.length} />
      <About />
      <Skills />
      <Projects projects={projects} />
      <Contact />
    </>
  );
}
