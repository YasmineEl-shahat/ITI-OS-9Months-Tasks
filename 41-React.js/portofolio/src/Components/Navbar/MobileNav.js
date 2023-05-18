import { onUpdateActiveLink } from "../../functions/onUpdateActiveLink";
import "./Navbar.scss";

export default function MobileNavbar({ activeLink, setActiveLink }) {
  const links = ["hero", "about", "skills", "projects"];
  return (
    <nav className="d-md-none navbarContainer mobileNavbar">
      <div className="mainContainer">
        <button
          className="d-inline-block toggleIcon"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
        >
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M3 7H21"
              stroke="#bfa27c"
              strokeWidth="2"
              strokeLinecap="round"
            />
            <path
              d="M3 12H21"
              stroke="#bfa27c"
              strokeWidth="2"
              strokeLinecap="round"
            />
            <path
              d="M3 17H21"
              stroke="#bfa27c"
              strokeWidth="2"
              strokeLinecap="round"
            />
          </svg>
        </button>
        <a href="/" className="name orbit paragraph">
          <span className="fname">John</span>
          <span className="lname">Doe</span>
        </a>
      </div>
      <div
        className="offcanvas  offcanvas-start navCanvas"
        id="offcanvasNavbar"
      >
        <div>
          <a href="/" className="name orbit paragraph">
            <span className="fname">John</span>
            <span className="lname">Doe</span>
          </a>
          <button
            className="d-inline-block toggleIcon"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar"
          >
            <i className="gg-close"></i>
          </button>
        </div>
        <ul>
          {links.map((link, index) => (
            <li data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
              <a
                key={`link${index}`}
                href={link == "hero" ? "/" : `#${link}`}
                className={`mobileLink  ${
                  activeLink === link ? " activeMobileLink" : ""
                }`}
                onClick={() => onUpdateActiveLink(link, setActiveLink)}
              >
                {link}
              </a>
            </li>
          ))}
        </ul>
      </div>
    </nav>
  );
}
