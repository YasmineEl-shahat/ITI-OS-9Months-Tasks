import Card from "../../SharedUi/Card/Card";
import getProjects from "../../data/projects.json";
import "./Projects.scss";

const Projects = () => {
  return (
    <section className="projects" id="projects">
      <div className="mainContainer">
        <h1 className="orbit">Projects</h1>
        <div className="cards-wrapper">
          {getProjects.map((project) => (
            <Card
              key={project.index}
              content={project.name}
              background={project.index % 2 ? "#bfa27c" : "#2a2a2ace"}
            />
          ))}
        </div>
      </div>
    </section>
  );
};

export default Projects;
