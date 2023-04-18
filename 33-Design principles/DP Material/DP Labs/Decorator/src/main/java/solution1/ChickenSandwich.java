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
public class ChickenSandwich extends Sandwich {

    @Override
    public String getDescription() {
        return super.getDescription() + " with Chicken";
    }

    @Override
    public float cost() {
        return 5f + super.cost();
    }

}
