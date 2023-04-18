/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package solution1;

/**
 *
 * @author JEDiver
 */
public class SimpleFactory {

   

    public Pizza createPizza(String type) {
    	 Pizza pizza  =null;
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
        return pizza;
    }
}
