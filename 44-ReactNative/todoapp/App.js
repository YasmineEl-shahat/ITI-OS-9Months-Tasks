import { Provider } from "react-redux";
import Routes from "./Routes/Routes";
import { PersistGate } from "redux-persist/integration/react";
import store, { persistor } from "./Redux/store";

export default function App() {
  return (
    <Provider store={store}>
      <PersistGate loading={null} persistor={persistor}>
        <Routes />
      </PersistGate>
    </Provider>
  );
}
