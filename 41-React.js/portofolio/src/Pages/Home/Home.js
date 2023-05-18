import { useState } from "react";

import MobileNavbar from "../../Components/Navbar/MobileNav";
import Navbar from "../../Components/Navbar/Navbar";
import Hero from "../../Components/Hero/Hero";
import Skills from "../../Components/Skills/Skills";
import Projects from "../../Components/Projects/Projects";
import Footer from "../../Components/Footer/Footer";

const Home = () => {
  const [activeLink, setActiveLink] = useState("hero");
  return (
    <>
      <Navbar activeLink={activeLink} setActiveLink={setActiveLink} />
      <MobileNavbar activeLink={activeLink} setActiveLink={setActiveLink} />
      <Hero />
      <Skills />
      <Projects />
      <Footer />
    </>
  );
};

export default Home;
