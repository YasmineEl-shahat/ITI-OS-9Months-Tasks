import { useEffect, useState } from "react";
import { useParams, useNavigate } from "react-router-dom";
import axiosInstance from "../../Axios";
import "./details.scss";

const ProductDetails = () => {
  const { productId } = useParams();
  const [productDetails, setProductDetails] = useState(null);
  const navigate = useNavigate();
  useEffect(() => {
    getProductDetails();
  }, []);
  const goBack = () => {
    navigate(-1);
  };
  const getProductDetails = async () => {
    await axiosInstance
      .get(`/Products/${productId}`)
      .then((res) => {
        setProductDetails(res.data);
      })
      .catch((err) => console.log(err));
  };

  return productDetails ? (
    <div className="details-wrapper p-4">
      <button className="info title" onClick={goBack}>
        <i className="fa-solid fa-arrow-left"></i>Back
      </button>

      <img
        src={productDetails.thumbnail}
        alt="thumbnail"
        className="thumbnail w-100 "
      />
      <div className="images-wrapper row row-cols-1 row-cols-md-3 g-4 ">
        {productDetails.images.map((image) => (
          <img key={image} src={image} />
        ))}
      </div>
      <p className="paragraph ">Title: {productDetails.title}</p>
      <p className="paragraph">Description: {productDetails.description}</p>
      <p className="paragraph">Category:{productDetails.category}</p>
    </div>
  ) : (
    <p>loading</p>
  );
};

export default ProductDetails;
