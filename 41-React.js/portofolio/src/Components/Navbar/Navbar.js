import { useState, useEffect } from "react";
import { onUpdateActiveLink } from "../../functions/onUpdateActiveLink";
import "./Navbar.scss";

export default function Navbar({ activeLink, setActiveLink }) {
  const [scrolled, setScrolled] = useState(false);

  const links = ["hero", "about", "skills", "projects"];
  useEffect(() => {
    const onScroll = () => {
      if (window.scrollY > 50) {
        setScrolled(true);
      } else {
        setScrolled(false);
      }
    };

    window.addEventListener("scroll", onScroll);

    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <nav
      className={` navbarContainer d-none d-md-block ${
        scrolled ? "scrolled" : ""
      }`}
    >
      <div className="h-100 mainContainer">
        {/* --------------- branding section ---------------- */}
        <section>
          <a href="/" className="name orbit paragraph">
            <span className="fname">John</span>
            <span className="lname">Doe</span>
          </a>
        </section>
        <section>
          {links.map((link, index) => (
            <a
              href={link == "hero" ? "/" : `#${link}`}
              key={`link${index}`}
              className={`navlinks info ${
                activeLink === link ? "activeLink" : ""
              }`}
              onClick={() => onUpdateActiveLink(link, setActiveLink)}
            >
              {link}
            </a>
          ))}
        </section>
      </div>
    </nav>
  );
}
