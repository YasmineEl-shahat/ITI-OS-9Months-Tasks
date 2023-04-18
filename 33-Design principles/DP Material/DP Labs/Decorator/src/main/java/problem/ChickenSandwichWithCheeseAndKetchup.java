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
public class ChickenSandwichWithCheeseAndKetchup extends ChickenSandwichWithCheese {

    @Override
    public String getDescription() {
        return super.getDescription() + " with Ketchup";
    }

    @Override
    public float cost() {
        return 1f + super.cost();
    }

}
