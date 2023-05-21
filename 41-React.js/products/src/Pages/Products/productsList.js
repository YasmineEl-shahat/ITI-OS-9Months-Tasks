import { Link } from "react-router-dom";
import axiosInstance from "../../Axios";
import { useEffect, useState } from "react";
import Card from "../../shared/card/card";

const ProductsList = () => {
  const [productsList, setProductsList] = useState([]);

  useEffect(() => {
    getProductsList();
  }, []);

  const getProductsList = async () => {
    await axiosInstance
      .get("/products")
      .then((res) => {
        setProductsList(res.data.products);
      })
      .catch((err) => console.log(err));
  };

  return (
    <section className="row row-cols-1 row-cols-md-3 g-4 m-4">
      {productsList.map((product) => (
        <Link to={`/product-details/${product.id}`} key={product.id}>
          <Card
            img={product.thumbnail}
            title={product.title}
            description={product.description}
            category={product.category}
          />
        </Link>
      ))}
    </section>
  );
};

export default ProductsList;
