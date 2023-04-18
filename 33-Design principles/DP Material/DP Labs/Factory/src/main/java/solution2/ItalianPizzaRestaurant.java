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
public class ItalianPizzaRestaurant extends PizzaRestaurant {

    @Override
    public Pizza createPizza(String type) {
        Pizza pizza = null;
        switch (type) {
            case "Cheese":
                pizza = new ItalianCheesePizza();
                break;
            case "Vegetable":
                pizza = new ItalianVegetablePizza();
                break;
            case "Seafood":
                pizza = new ItalianSeafoodPizza();
                break;
            default:
                break;
        }
        return pizza;
    }
}
