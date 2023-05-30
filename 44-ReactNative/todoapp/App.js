import { NavigationContainer } from "@react-navigation/native";
import { createStackNavigator } from "@react-navigation/stack";
// import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";

import TodoDetails from "./TodoDetaills";
import Home from "./Home";

const Stack = createStackNavigator();
// const Tab = createBottomTabNavigator();

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator>
        <Stack.Screen name="Home" component={Home} />
        <Stack.Screen name="TodoDetails" component={TodoDetails} />
      </Stack.Navigator>
      {/* <Tab.Navigator>
        <Tab.Screen name="Home" component={Home} />
        <Tab.Screen name="TodoDetails" component={TodoDetails} />
      </Tab.Navigator> */}
    </NavigationContainer>
  );
}
