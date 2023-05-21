import { RouterProvider } from "react-router-dom";
import Routes from "./Routes";

function App() {
  return (
    <div className="App">
      <RouterProvider router={Routes} />
    </div>
  );
}

export default App;
