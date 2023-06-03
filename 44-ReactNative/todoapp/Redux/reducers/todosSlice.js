// src/reducers/todosSlice.js
import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";

// First, create the thunk
export const getUserDetails = createAsyncThunk("user", async (userId) => {
  const response = await fetch(`https://reqres.in/api/users/${userId}`);
  return response.json();
});

const todosSlice = createSlice({
  name: "todos",
  initialState: {
    todos: [],
    user: {},
    error: "",
    loader: false,
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
    builder
      .addCase(getUserDetails.fulfilled, (state, action) => {
        // Add user to the state array
        state.user = action.payload;
        state.loader = false;
        console.log(state.user);
      })
      .addCase(getUserDetails.rejected, (state, action) => {
        state.error = action.payload;
        state.loader = false;
      })
      .addCase(getUserDetails.pending, (state, action) => {
        state.loader = true;
      });
  },
});

export const { addTodo, toggleTodo, deleteTodo } = todosSlice.actions;

export default todosSlice.reducer;
