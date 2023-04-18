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
public class Mashroum extends CondimentDecorator {

    private final Sandwich sandwich;

    public Mashroum(Sandwich sandwich) {
        this.sandwich = sandwich;
    }

    @Override
    public float cost() {
        return 2f + sandwich.cost();
    }

    @Override
    public String getDescription() {
        return sandwich.getDescription() + " with Mashroum";
    }

}
