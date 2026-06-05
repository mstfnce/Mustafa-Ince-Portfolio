// Static project data — ported from the original PHP/MySQL `projects` table seed
// (database.sql). Editing this file + git push redeploys the site on Vercel.
// No database is used anymore.

export type Project = {
  title: string;
  description: string;
  tech: string;
  tech_class: string;
  tag: string;
  project_url: string | null;
  is_featured: boolean;
  sort_order: number;
};

export const projects: Project[] = [
  {
    title: "Mustafa Ince Portfolio",
    description:
      "Full-stack web portfolio with PHP, MySQL, AJAX contact form, secure admin login, sessions, cookies, and database-driven project management.",
    tech: "PHP/MySQL",
    tech_class: "php-dot",
    tag: "Featured",
    project_url: "https://github.com/mstfnce/Mustafa-Ince-Portfolio",
    is_featured: true,
    sort_order: 1,
  },
  {
    title: "Dotnet Store",
    description:
      "ASP.NET Core MVC e-commerce project with product, category, user management, cart, and order features.",
    tech: ".NET",
    tech_class: "dotnet-dot",
    tag: "Featured",
    project_url: "https://github.com/mstfnce/Dotnet-Store",
    is_featured: true,
    sort_order: 2,
  },
  {
    title: "MovieApp",
    description:
      "React and Vite movie discovery app using the TMDB API with search, movie details, theme switching, and watchlist features.",
    tech: "React",
    tech_class: "react-dot",
    tag: "Featured",
    project_url: "https://github.com/mstfnce/MovieApp",
    is_featured: true,
    sort_order: 3,
  },
  {
    title: "Weather App",
    description:
      "Responsive React weather app showing current weather, hourly forecast, 5-day forecast, and sunrise/sunset times using OpenWeather API.",
    tech: "React",
    tech_class: "react-dot",
    tag: "Public",
    project_url: "https://github.com/mstfnce/Weather-App",
    is_featured: false,
    sort_order: 4,
  },
  {
    title: "Task Tracker App",
    description:
      "Android app for creating goals and tracking daily progress with task editing, filtering, and progress visualization.",
    tech: "Java",
    tech_class: "java-dot",
    tag: "Public",
    project_url: "https://github.com/mstfnce/Task-Tracker-App",
    is_featured: false,
    sort_order: 5,
  },
  {
    title: "CashFlow App",
    description:
      "Java Android finance management app for tracking income, expenses, categories, and daily/weekly/monthly summaries.",
    tech: "Java",
    tech_class: "java-dot",
    tag: "Public",
    project_url: "https://github.com/mstfnce/CashFlow-App",
    is_featured: false,
    sort_order: 6,
  },
  {
    title: "Quiz App",
    description:
      "Interactive JavaScript quiz application with timer, progress tracking, answer validation, and score calculation.",
    tech: "JS",
    tech_class: "js-dot",
    tag: "Public",
    project_url: "https://github.com/mstfnce/Quiz-App",
    is_featured: false,
    sort_order: 7,
  },
  {
    title: "Blog Site",
    description:
      "Modern dark-themed Bootstrap 5 blog layout with responsive navbar, hero section, blog cards, categories, and trending topics.",
    tech: "Bootstrap",
    tech_class: "html-dot",
    tag: "Public",
    project_url: "https://github.com/mstfnce/blog-site",
    is_featured: false,
    sort_order: 8,
  },
];

// Returns projects ordered like the original SQL (ORDER BY sort_order ASC).
export function getProjects(): Project[] {
  return [...projects].sort((a, b) => a.sort_order - b.sort_order);
}

// Mirrors isSafeProjectUrl() from the original script.js — only http/https links.
export function isSafeProjectUrl(value: string | null): value is string {
  if (!value) return false;
  try {
    const url = new URL(value);
    return url.protocol === "http:" || url.protocol === "https:";
  } catch {
    return false;
  }
}
