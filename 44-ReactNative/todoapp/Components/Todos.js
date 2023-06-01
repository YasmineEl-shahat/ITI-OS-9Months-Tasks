import React from "react";
import { View, StyleSheet } from "react-native";
import Todo from "./Todo";

const Todos = ({ filteredTodos, setSelectedTodo, setModalVisible }) => {
  return (
    <View style={styles.todosContainer}>
      {filteredTodos.map((todo, index) => (
        <Todo
          key={index}
          todo={todo}
          index={index}
          setSelectedTodo={setSelectedTodo}
          setModalVisible={setModalVisible}
        />
      ))}
    </View>
  );
};

const styles = StyleSheet.create({
  todosContainer: {
    width: "100%",
  },
});

export default Todos;
