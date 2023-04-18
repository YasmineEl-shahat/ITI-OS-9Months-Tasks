/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package solution2;

/**
 *
 * @author JEDiver
 */
public class EgyptianPizzaRestaurant extends PizzaRestaurant {

    @Override
    public Pizza createPizza(String type) {
        Pizza pizza = null;
        switch (type) {
            case "Cheese":
                pizza = new EgyptianCheesePizza();
                break;
            case "Vegetable":
                pizza = new EgyptianVegetablePizza();
                break;
            case "Seafood":
                pizza = new EgyptianSeafoodPizza();
                break;
            default:
                break;
        }
        return pizza;
    }
}
