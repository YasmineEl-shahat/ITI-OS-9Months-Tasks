import React, { useState, useEffect } from "react";
import {
  StyleSheet,
  Text,
  View,
  TextInput,
  Button,
  TouchableOpacity,
  Modal,
} from "react-native";
import AsyncStorage from "@react-native-async-storage/async-storage";

import { useNavigation } from "@react-navigation/native";
import MaterialIcons from "react-native-vector-icons/MaterialIcons";

export default function Home() {
  const [todos, setTodos] = useState([]);
  const [todoTitle, setTodoTitle] = useState("");
  const [todoDesc, setTodoDesc] = useState("");
  const [filterType, setFilterType] = useState("All");
  const [deleteTodo, setDeleteTodo] = useState(null);
  const [modalVisible, setModalVisible] = useState(false);
  const navigation = useNavigation();

  useEffect(() => {
    async function loadTodos() {
      try {
        const storedTodos = await AsyncStorage.getItem("todos");
        if (storedTodos !== null) {
          setTodos(JSON.parse(storedTodos));
        }
      } catch (error) {
        console.log(error);
      }
    }
    loadTodos();
  }, []);

  useEffect(() => {
    async function saveTodos() {
      try {
        await AsyncStorage.setItem("todos", JSON.stringify(todos));
      } catch (error) {
        console.log(error);
      }
    }
    saveTodos();
  }, [todos]);

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

  const deleteTodoConfirm = () => {
    const newTodos = todos.filter((todo) => todo !== deleteTodo);
    setTodos(newTodos);
    setDeleteTodo(null);
    setModalVisible(false);
  };

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
          <View key={index} style={styles.todo}>
            <TouchableOpacity
              onPress={() =>
                navigation.navigate("TodoDetails", {
                  title: todo.title,
                  description: todo.description,
                })
              }
              onLongPress={() => {
                toggleTodo(index);
              }}
            >
              <Text style={[styles.todoTitle, todo.done && styles.doneTodo]}>
                {todo.title}
              </Text>
              <Text style={styles.todoDesc}>{todo.description}</Text>
            </TouchableOpacity>
            <TouchableOpacity
              style={styles.deleteIcon}
              onPress={() => {
                setDeleteTodo(todo);
                setModalVisible(true);
              }}
            >
              <MaterialIcons name="delete" size={24} color="#000" />
            </TouchableOpacity>
          </View>
        ))}
      </View>
      <Modal
        animationType="slide"
        transparent={true}
        visible={modalVisible}
        onRequestClose={() => {
          setModalVisible(false);
        }}
      >
        <View style={styles.modalContainer}>
          <View style={styles.modalContent}>
            <Text style={styles.modalTitle}>Delete Todo</Text>
            <Text style={styles.modalText}>
              Are you sure you want to delete this todo?
            </Text>
            <View style={styles.modalButtons}>
              <TouchableOpacity
                style={[styles.modalButton, styles.cancelButton]}
                onPress={() => {
                  setDeleteTodo(null);
                  setModalVisible(false);
                }}
              >
                <Text style={styles.modalButtonText}>Cancel</Text>
              </TouchableOpacity>
              <TouchableOpacity
                style={[styles.modalButton, styles.deleteButton]}
                onPress={deleteTodoConfirm}
              >
                <Text style={styles.modalButtonText}>Delete</Text>
              </TouchableOpacity>
            </View>
          </View>
        </View>
      </Modal>
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
    flex: 1,
    flexDirection: "row",
    alignItems: "center",
    color: "#000",
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
  modalContainer: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: "rgba(0, 0, 0, 0.5)",
  },
  modalContent: {
    backgroundColor: "#fff",
    borderRadius: 10,
    padding: 20,
    alignItems: "center",
  },
  modalTitle: {
    fontSize: 24,
    fontWeight: "bold",
    marginBottom: 10,
  },
  modalText: {
    fontSize: 16,
    marginBottom: 20,
  },
  modalButtons: {
    flexDirection: "row",
    justifyContent: "space-between",
    width: "100%",
  },
  modalButton: {
    borderRadius: 5,
    padding: 10,
    width: "45%",
    alignItems: "center",
  },
  cancelButton: {
    backgroundColor: "#ccc",
  },
  deleteButton: {
    backgroundColor: "#f00",
  },
  modalButtonText: {
    fontWeight: "bold",
    color: "#fff",
  },
  deleteIcon: {
    position: "absolute",
    right: 4,
  },
});
