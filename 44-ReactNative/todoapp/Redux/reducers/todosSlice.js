// src/reducers/todosSlice.js
import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";

// First, create the thunk
const fetchProductById = createAsyncThunk("products", async (productId) => {
  const response = await fetch(`https://dummyjson.com/products/${productId}`);
  return response.json();
});

const todosSlice = createSlice({
  name: "todos",
  initialState: {
    todos: [],
    entities: [],
  },
  reducers: {
    addTodo: (state, action) => {
      // payload here expect todo
      state.todos.push(action.payload);
    },
    toggleTodo: (state, action) => {
      // payload here expect todo indx
      const todo = state.todos[action.payload];
      todo.done = !todo.done;
    },
    deleteTodo: (state, action) => {
      state.todos.splice(action.payload, 1);
    },
  },
  extraReducers: (builder) => {
    // Add reducers for additional action types here, and handle loading state as needed
    builder.addCase(fetchProductById.fulfilled, (state, action) => {
      // Add user to the state array
      state.entities.push(action.payload);
      console.log(state.entities);
    });
  },
});

export const { addTodo, toggleTodo, deleteTodo, extraReducers } =
  todosSlice.actions;

export default todosSlice.reducer;
