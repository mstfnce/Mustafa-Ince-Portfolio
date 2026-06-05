import type { Metadata } from "next";
import "./globals.css";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import ScrollEffects from "@/components/ScrollEffects";

export const metadata: Metadata = {
  title: "Mustafa Ince - Software Developer",
  description:
    "Software Developer based in Istanbul. I build modern digital experiences from interface to database layer.",
};

const fontsHref =
  "https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=DM+Mono:wght@300;400;500&family=Syne:wght@400;600;700;800&display=swap";

export default function RootLayout({
  children,
}: Readonly<{ children: React.ReactNode }>) {
  return (
    <html lang="en">
      <head>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link
          rel="preconnect"
          href="https://fonts.gstatic.com"
          crossOrigin=""
        />
        <link href={fontsHref} rel="stylesheet" />
      </head>
      <body>
        <div className="noise-overlay"></div>
        <Header />
        {children}
        <Footer />
        <ScrollEffects />
      </body>
    </html>
  );
}
