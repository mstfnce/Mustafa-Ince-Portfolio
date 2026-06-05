// Ported from includes/footer.php.
export default function Footer() {
  const year = new Date().getFullYear();
  return (
    <footer className="footer">
      <span className="footer-mono">© {year} Mustafa Ince</span>
      <span className="footer-mono">Built with Next.js · React · TS</span>
    </footer>
  );
}
