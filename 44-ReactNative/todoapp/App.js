import React, { useState } from "react";
import {
  StyleSheet,
  Text,
  View,
  TextInput,
  Button,
  TouchableOpacity,
} from "react-native";

export default function App() {
  const [todos, setTodos] = useState([]);
  const [todoTitle, setTodoTitle] = useState("");
  const [todoDesc, setTodoDesc] = useState("");
  const [filterType, setFilterType] = useState("All");

  const addTodo = () => {
    if (todoTitle === "") return;
    setTodos([
      ...todos,
      { title: todoTitle, description: todoDesc, done: false },
    ]);
    setTodoTitle("");
    setTodoDesc("");
  };

  const toggleTodo = (index) => {
    const newTodos = [...todos];
    newTodos[index].done = !newTodos[index].done;
    setTodos(newTodos);
  };

  const filterTodos = (type) => {
    setFilterType(type);
  };

  const filteredTodos = todos.filter((todo) => {
    if (filterType === "All") return true;
    if (filterType === "Active") return !todo.done;
    if (filterType === "Done") return todo.done;
    return false;
  });

  return (
    <View style={styles.container}>
      <Text style={styles.title}>TODO APP</Text>
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
      <Button title="Add Todo" onPress={addTodo} />
      <View style={styles.divider} />
      <View style={styles.filterButtons}>
        <TouchableOpacity
          style={[
            styles.filterButton,
            filterType === "All" && styles.activeFilterButton,
          ]}
          onPress={() => filterTodos("All")}
        >
          <Text style={styles.filterButtonText}>All</Text>
        </TouchableOpacity>
        <TouchableOpacity
          style={[
            styles.filterButton,
            filterType === "Active" && styles.activeFilterButton,
          ]}
          onPress={() => filterTodos("Active")}
        >
          <Text style={styles.filterButtonText}>Active</Text>
        </TouchableOpacity>
        <TouchableOpacity
          style={[
            styles.filterButton,
            filterType === "Done" && styles.activeFilterButton,
          ]}
          onPress={() => filterTodos("Done")}
        >
          <Text style={styles.filterButtonText}>Done</Text>
        </TouchableOpacity>
      </View>
      <View style={styles.todosContainer}>
        {filteredTodos.map((todo, index) => (
          <TouchableOpacity
            key={index}
            style={styles.todo}
            onPress={() => toggleTodo(index)}
          >
            <Text style={[styles.todoTitle, todo.done && styles.doneTodo]}>
              {todo.title}
            </Text>
            <Text style={styles.todoDesc}>{todo.description}</Text>
          </TouchableOpacity>
        ))}
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
    alignItems: "center",
    justifyContent: "center",
    paddingHorizontal: 20,
  },
  title: {
    fontSize: 24,
    fontWeight: "bold",
    marginBottom: 20,
  },
  input: {
    borderWidth: 1,
    borderColor: "#ccc",
    borderRadius: 5,
    padding: 10,
    marginVertical: 10,
    width: "100%",
  },
  divider: {
    height: 1,
    backgroundColor: "#ccc",
    width: "100%",
    marginVertical: 20,
  },
  filterButtons: {
    flexDirection: "row",
    justifyContent: "space-between",
    width: "100%",
    marginBottom: 10,
  },
  filterButton: {
    borderWidth: 1,
    borderColor: "#ccc",
    borderRadius: 5,
    padding: 10,
    width: "30%",
    alignItems: "center",
  },
  activeFilterButton: {
    backgroundColor: "#ccc",
  },
  filterButtonText: {
    fontWeight: "bold",
  },
  todosContainer: {
    width: "100%",
  },
  todo: {
    borderWidth: 1,
    borderColor: "#ccc",
    borderRadius: 5,
    padding: 10,
    marginVertical: 5,
  },
  todoTitle: {
    fontWeight: "bold",
    textDecorationLine: "none",
  },
  todoDesc: {
    marginTop: 5,
  },
  doneTodo: {
    textDecorationLine: "line-through",
  },
});
