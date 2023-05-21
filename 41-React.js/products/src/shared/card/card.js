import "./card.scss";
const Card = (props) => {
  return (
    <div class="card custom-card h-100 ">
      <img src={props.img} class="card-img-top mt-4" alt={props.title} />
      <div class="card-body ">
        <h5 class="card-title paragraph title">{props.title}</h5>
        <p class="card-text info">
          {props.description.substring(0, 50)}{" "}
          {props.description.length > 50 ? "..." : ""}
        </p>
        <button class="btn btn-primary info">{props.category}</button>
      </div>
    </div>
  );
};

export default Card;
