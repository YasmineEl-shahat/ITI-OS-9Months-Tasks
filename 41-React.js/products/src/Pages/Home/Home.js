import { Link } from "react-router-dom";

const Home = () => {
  return (
    <Link to="/products-list" className="Btn info productsBtn">
      Products list
    </Link>
  );
};

export default Home;
