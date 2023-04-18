/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package problem;

/**
 *
 * @author JEDiver
 */
public class PizzaRestaurant {

    public Pizza orderPizza(String type) {
        Pizza pizza = null;

        switch (type) {
            case "Cheese":
                pizza = new CheesePizza();
                break;
            case "Vegetable":
                pizza = new VegetablePizza();
                break;
            case "Seafood":
                pizza = new SeafoodPizza();
                break;
            default:
                break;
        }
        if (pizza != null) {
            pizza.prepare();
            pizza.bake();
            pizza.cut();
            pizza.box();
            System.out.println("-----------------------------");
        }
        return pizza;
    }

}
