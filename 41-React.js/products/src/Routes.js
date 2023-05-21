import { createBrowserRouter } from "react-router-dom";
import Home from "./Pages/Home/Home";
import ProductsList from "./Pages/Products/productsList";
import ProductDetails from "./Pages/Products/productDetails";

const Routes = createBrowserRouter([
  {
    path: "/",
    element: <Home />,
  },
  {
    path: "/products-list",
    element: <ProductsList />,
  },
  {
    path: "/product-details/:productId",
    element: <ProductDetails />,
  },
]);

export default Routes;
