import React, { useState } from "react";
import { TextInput, Button, StyleSheet } from "react-native";
import { addTodo } from "../Redux/reducers/todosSlice";
import { useDispatch } from "react-redux";

const Form = () => {
  const [todoTitle, setTodoTitle] = useState("");
  const [todoDesc, setTodoDesc] = useState("");

  const dispatch = useDispatch();

  const addTodoHandler = () => {
    if (todoTitle === "") return;
    dispatch(addTodo({ title: todoTitle, description: todoDesc, done: false }));
    setTodoTitle("");
    setTodoDesc("");
  };
  return (
    <>
      <TextInput
        style={styles.input}
        placeholder="Todo Title"
        value={todoTitle}
        onChangeText={(text) => setTodoTitle(text)}
      />
      <TextInput
        style={styles.input}
        placeholder="Todo Description"
        value={todoDesc}
        onChangeText={(text) => setTodoDesc(text)}
      />
      <Button title="Add Todo" onPress={addTodoHandler} />
    </>
  );
};

const styles = StyleSheet.create({
  input: {
    borderWidth: 1,
    borderColor: "#ccc",
    borderRadius: 5,
    padding: 10,
    marginVertical: 10,
    width: "100%",
  },
});

export default Form;
