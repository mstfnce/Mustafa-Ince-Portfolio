"use client";

import { useEffect } from "react";

// Ported from assets/js/script.js — all the global, DOM-driven behaviors that
// the original inline script handled on DOMContentLoaded. Runs once after mount
// and registers cleanups so it is safe under React StrictMode double-invocation.
//
// Intentionally NOT ported: the hidden admin trigger (no admin panel) and the
// AJAX project loader (projects are now server-rendered from static data).
export default function ScrollEffects() {
  useEffect(() => {
    const cleanups: Array<() => void> = [];

    // 2. Header scroll state
    const header = document.getElementById("header");
    const onScroll = () => {
      if (window.scrollY > 60) header?.classList.add("scrolled");
      else header?.classList.remove("scrolled");
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    cleanups.push(() => window.removeEventListener("scroll", onScroll));

    // 3. Smooth scroll — hero button + in-page anchor links
    const scrollBtn = document.getElementById("scrollBtn");
    const aboutSection = document.querySelector("#about");
    const onExplore = () =>
      aboutSection?.scrollIntoView({ behavior: "smooth" });
    scrollBtn?.addEventListener("click", onExplore);
    cleanups.push(() => scrollBtn?.removeEventListener("click", onExplore));

    document
      .querySelectorAll<HTMLAnchorElement>('a[href^="#"]')
      .forEach((link) => {
        const handler = (e: MouseEvent) => {
          const href = link.getAttribute("href");
          const target = href ? document.querySelector(href) : null;
          if (target) {
            e.preventDefault();
            target.scrollIntoView({ behavior: "smooth" });
          }
        };
        link.addEventListener("click", handler);
        cleanups.push(() => link.removeEventListener("click", handler));
      });

    // 4. Counter animation helper
    const animateCounter = (
      el: HTMLElement,
      target: number,
      duration = 1400,
    ) => {
      let start = 0;
      const step = (timestamp: number) => {
        if (!start) start = timestamp;
        const progress = Math.min((timestamp - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3); // ease-out
        el.textContent = String(Math.floor(eased * target));
        if (progress < 1) requestAnimationFrame(step);
        else el.textContent = String(target);
      };
      requestAnimationFrame(step);
    };

    // 5. Reveal observer
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
    document
      .querySelectorAll<HTMLElement>(
        ".about-grid, .skills-layout, .project-card, .contact-body, .specs-grid, .image-wrapper",
      )
      .forEach((el, i) => {
        el.classList.add("reveal");
        el.style.transitionDelay = `${i * 0.08}s`;
        revealObserver.observe(el);
      });
    cleanups.push(() => revealObserver.disconnect());

    // Skill bars observer
    const barObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target
              .querySelectorAll<HTMLElement>(".bar-fill")
              .forEach((bar, i) => {
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
    cleanups.push(() => barObserver.disconnect());

    // Hero counter observer
    const counterEls =
      document.querySelectorAll<HTMLElement>(".stat-num[data-target]");
    let countersStarted = false;
    const heroObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !countersStarted) {
            countersStarted = true;
            counterEls.forEach((el, i) => {
              setTimeout(() => {
                animateCounter(el, Number(el.dataset.target));
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
    cleanups.push(() => heroObserver.disconnect());

    // 6. Skill node tooltip
    const tooltip = document.getElementById("skillTooltip");
    document.querySelectorAll<HTMLElement>(".skill-node").forEach((node) => {
      const enter = () => {
        if (tooltip) {
          tooltip.textContent = node.dataset.skill ?? "";
          tooltip.style.opacity = "1";
        }
      };
      const leave = () => {
        if (tooltip) tooltip.style.opacity = "0";
      };
      node.addEventListener("mouseenter", enter);
      node.addEventListener("mouseleave", leave);
      cleanups.push(() => {
        node.removeEventListener("mouseenter", enter);
        node.removeEventListener("mouseleave", leave);
      });
    });

    // 7. Project card hover tilt
    document.querySelectorAll<HTMLElement>(".project-card").forEach((card) => {
      const move = (e: MouseEvent) => {
        const rect = card.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        const deltaX = ((e.clientX - centerX) / rect.width) * 6;
        const deltaY = ((e.clientY - centerY) / rect.height) * 6;
        card.style.transform = `perspective(800px) rotateX(${-deltaY}deg) rotateY(${deltaX}deg) translateZ(4px)`;
      };
      const leave = () => {
        card.style.transform = "";
      };
      card.addEventListener("mousemove", move);
      card.addEventListener("mouseleave", leave);
      cleanups.push(() => {
        card.removeEventListener("mousemove", move);
        card.removeEventListener("mouseleave", leave);
      });
    });

    // 8. Active nav highlight on scroll
    const navItems = document.querySelectorAll<HTMLElement>(".nav-item");
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
    document
      .querySelectorAll("section[id]")
      .forEach((s) => navObserver.observe(s));
    cleanups.push(() => navObserver.disconnect());

    // 10. Console signature
    console.log(
      "%c MUSTAFA INCE PORTFOLIO ",
      "background:#c8a96e;color:#0a0a0a;font-weight:bold;font-size:14px;padding:6px 12px;",
    );
    console.log(
      "%cDeveloper:%c Mustafa Ince",
      "color:#c8a96e",
      "color:#f0ede8",
    );
    console.log(
      "%cRole:%c      Software Developer",
      "color:#c8a96e",
      "color:#f0ede8",
    );
    console.log(
      "%cStatus:%c    ✓ ONLINE",
      "color:#c8a96e",
      "color:#4ade80;font-weight:bold",
    );

    return () => cleanups.forEach((fn) => fn());
  }, []);

  return null;
}
