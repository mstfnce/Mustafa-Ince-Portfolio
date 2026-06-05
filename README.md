# Mustafa Ince — Portfolio

Personal portfolio site rebuilt with **Next.js 16 + React 19 + TypeScript**.

**Live:** deployed on Vercel (see below) | **Source:** `portfolio-next/`

## Stack

- Next.js 16 (App Router, Turbopack)
- React 19 — Server Components + Client Components
- TypeScript
- Resend (contact form → email)
- Deployed on Vercel (free tier)

## Project structure

```
portfolio-next/
  app/              # pages, layout, API routes
  components/       # section components + ScrollEffects
  lib/projects.ts   # static project list — edit here to add/remove projects
  public/           # profile image, CV files
```

## Adding / editing projects

Open `portfolio-next/lib/projects.ts`, edit the `projects` array, then push. Vercel redeploys automatically.

## Contact form setup

The contact form requires a [Resend](https://resend.com) API key.

1. Copy `portfolio-next/.env.example` → `portfolio-next/.env.local`
2. Fill in `RESEND_API_KEY` (free tier at resend.com)
3. Optionally set `CONTACT_TO_EMAIL` (defaults to `mustafancee.52@gmail.com`)

On Vercel: add both as environment variables in the project settings.

## Local development

```bash
cd portfolio-next
npm install
npm run dev
# → http://localhost:3000
```

## Deploy to Vercel

1. Push repo to GitHub
2. Import on [vercel.com](https://vercel.com)
3. Set **Root Directory** to `portfolio-next`
4. Add `RESEND_API_KEY` (and optionally `CONTACT_TO_EMAIL`) in environment variables
5. Deploy
