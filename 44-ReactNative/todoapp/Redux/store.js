import { configureStore } from "@reduxjs/toolkit";
import todosReducer from "./reducers/todosSlice";
import { persistStore, persistReducer } from "redux-persist";
import AsyncStorage from "@react-native-async-storage/async-storage";

const persistConfig = {
  key: "todos",
  storage: AsyncStorage,
};
const persistedReducer = persistReducer(persistConfig, todosReducer);

const store = configureStore({
  reducer: {
    todos: persistedReducer,
  },
});

export const persistor = persistStore(store);

export default store;
