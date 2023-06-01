import React from "react";
import { View, Text, TouchableOpacity, StyleSheet } from "react-native";
import MaterialIcons from "react-native-vector-icons/MaterialIcons";
import { useNavigation } from "@react-navigation/native";
import { useDispatch } from "react-redux";
import { toggleTodo } from "../Redux/reducers/todosSlice";

const Todo = ({ todo, index, setSelectedTodo, setModalVisible }) => {
  const navigation = useNavigation();
  const dispatch = useDispatch();

  const toggleTodoHandler = (index) => {
    dispatch(toggleTodo(index));
  };
  return (
    <View style={styles.todo}>
      <TouchableOpacity
        onPress={() =>
          navigation.navigate("TodoDetails", {
            title: todo.title,
            description: todo.description,
          })
        }
        onLongPress={() => {
          toggleTodoHandler(index);
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
          setSelectedTodo(todo);
          setModalVisible(true);
        }}
      >
        <MaterialIcons name="delete" size={24} color="#000" />
      </TouchableOpacity>
    </View>
  );
};

const styles = StyleSheet.create({
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
  deleteIcon: {
    position: "absolute",
    right: 4,
  },
});

export default Todo;
