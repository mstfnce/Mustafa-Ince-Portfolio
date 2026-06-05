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

// Edit these to control which repos appear as "Featured" (order matters).
const FEATURED_REPOS = [
  "Mustafa-Ince-Portfolio",
  "Dotnet-Store",
  "MovieApp",
];

// Repos to hide (e.g. profile README).
const EXCLUDED_REPOS = ["mstfnce"];

const LANGUAGE_MAP: Record<string, { label: string; cls: string }> = {
  TypeScript:  { label: "TS",       cls: "js-dot"     },
  JavaScript:  { label: "JS",       cls: "js-dot"     },
  PHP:         { label: "PHP",      cls: "php-dot"    },
  "C#":        { label: ".NET",     cls: "dotnet-dot" },
  Java:        { label: "Java",     cls: "java-dot"   },
  HTML:        { label: "HTML",     cls: "html-dot"   },
  CSS:         { label: "CSS",      cls: "html-dot"   },
  Python:      { label: "Python",   cls: "js-dot"     },
  Kotlin:      { label: "Kotlin",   cls: "java-dot"   },
  Swift:       { label: "Swift",    cls: "js-dot"     },
};

type GithubRepo = {
  name: string;
  description: string | null;
  html_url: string;
  language: string | null;
  fork: boolean;
  stargazers_count: number;
};

export async function getProjects(): Promise<Project[]> {
  try {
    const headers: HeadersInit = {
      Accept: "application/vnd.github+json",
    };
    if (process.env.GITHUB_TOKEN) {
      headers.Authorization = `Bearer ${process.env.GITHUB_TOKEN}`;
    }

    const res = await fetch(
      "https://api.github.com/users/mstfnce/repos?sort=pushed&direction=desc&per_page=50",
      { next: { revalidate: 3600 }, headers }
    );
    if (!res.ok) throw new Error(`GitHub API responded with ${res.status}`);

    const repos: GithubRepo[] = await res.json();

    const visible = repos.filter(
      (r) => !r.fork && !EXCLUDED_REPOS.includes(r.name)
    );

    visible.sort((a, b) => {
      const af = FEATURED_REPOS.indexOf(a.name);
      const bf = FEATURED_REPOS.indexOf(b.name);
      // Featured repos come first in FEATURED_REPOS order; rest by stars desc.
      if (af !== -1 && bf !== -1) return af - bf;
      if (af !== -1) return -1;
      if (bf !== -1) return 1;
      return b.stargazers_count - a.stargazers_count;
    });

    return visible.map((repo, i) => {
      const isFeatured = FEATURED_REPOS.includes(repo.name);
      const lang = repo.language ?? "HTML";
      const mapped = LANGUAGE_MAP[lang] ?? { label: lang, cls: "js-dot" };
      return {
        title: repo.name.replace(/-/g, " "),
        description: repo.description ?? "No description provided.",
        tech: mapped.label,
        tech_class: mapped.cls,
        tag: isFeatured ? "Featured" : "Public",
        project_url: repo.html_url,
        is_featured: isFeatured,
        sort_order: i + 1,
      };
    });
  } catch (err) {
    console.error("[getProjects] GitHub fetch failed:", err);
    return [];
  }
}

export function isSafeProjectUrl(value: string | null): value is string {
  if (!value) return false;
  try {
    const url = new URL(value);
    return url.protocol === "http:" || url.protocol === "https:";
  } catch {
    return false;
  }
}
