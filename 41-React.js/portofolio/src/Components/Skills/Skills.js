import getSkills from "../../data/skills.json";
import "./Skills.scss";
export default function Skills() {
  return (
    <section className="skills mainContainer" id="skills">
      <h1 className="orbit">My Skills</h1>
      <article className="wrapper">
        {getSkills.map((skill) => (
          <div key={`skill${skill.index}`}>
            <h5 className="paragraph">{skill.name}</h5>
            <div className="progress">
              <div
                className="progress-bar"
                style={{ width: skill.level }}
              ></div>
            </div>
          </div>
        ))}
      </article>
    </section>
  );
}
