import "./hero.scss";
export default function Hero() {
  return (
    <section className="banner" id="about">
      <span></span>
      <div className="mainContainer wrap">
        <article className="paragraphContainer">
          <p className="welcome">Welcome I’M</p>
          <h1 className="orbit name">John Doe</h1>
          <p className="paragraph">
            Hardworking front-end developer, writing maintainable and readable
            code, responsible for the translating ui designs into technical
            implementation, looking to optain a front-end position where I can
            develop my knowledge and earn practical experience by being exposed
            to new challenges.
          </p>
          <a href="#contact" passHref>
            <button className="bttn paragraph">Contact Me</button>
          </a>
        </article>
        <article className="logo-wrapper">
          {/* eslint-disable */}
          <img className="logo" alt="logo" src="/logo.png" />
        </article>
      </div>
    </section>
  );
}
