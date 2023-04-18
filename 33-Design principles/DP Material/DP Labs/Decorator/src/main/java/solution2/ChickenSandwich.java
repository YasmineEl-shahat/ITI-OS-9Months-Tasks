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
public class ChickenSandwich extends Sandwich {

    private Sandwich sandwich = null;

    public ChickenSandwich(Sandwich sandwich) {
        this.sandwich = sandwich;
    }

    public ChickenSandwich() {
        description = "Chicken Sandwich";
    }

    @Override
    public float cost() {
        return 5f + super.cost();
    }

}
