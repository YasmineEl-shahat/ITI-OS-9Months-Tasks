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
public class ChickenSandwichWithCheese extends ChickenSandwich {

    @Override
    public String getDescription() {
        return super.getDescription() + " with Cheese";
    }

    @Override
    public float cost() {
        return 2f + super.cost();
    }

}
