import "./card.scss";
const Card = (props) => {
  return (
    <div
      className="custom-card paragraph"
      style={{ background: props.background }}
    >
      {props.content}
    </div>
  );
};

export default Card;
