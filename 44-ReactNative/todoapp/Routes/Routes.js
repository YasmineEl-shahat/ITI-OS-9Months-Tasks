import { NavigationContainer } from "@react-navigation/native";
import { createStackNavigator } from "@react-navigation/stack";
// import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
// import { AntDesign } from "@expo/vector-icons";

import TodoDetails from "../Components/TodoDetaills";
import Home from "../Components/Home";

const Stack = createStackNavigator();
// const Tab = createBottomTabNavigator();

export default function Routes() {
  return (
    <NavigationContainer>
      <Stack.Navigator
        initialRouteName="Home"
        screenOptions={{ headerShown: true }}
      >
        <Stack.Screen
          options={{ headerShown: false }}
          name="Home"
          component={Home}
        />
        <Stack.Screen name="TodoDetails" component={TodoDetails} />
      </Stack.Navigator>
      {/* <Tab.Navigator
        screenOptions={{
          headerShown: false,
          //   tabBarStyle: { backgroundColor: "green" },
        }}
      >
        <Tab.Screen
          options={{
            tabBarIcon: (focused) => <AntDesign name="home" size={20} />,
          }}
          name="Home"
          component={Home}
        />
        <Tab.Screen name="TodoDetails" component={TodoDetails} />
      </Tab.Navigator> */}
    </NavigationContainer>
  );
}
