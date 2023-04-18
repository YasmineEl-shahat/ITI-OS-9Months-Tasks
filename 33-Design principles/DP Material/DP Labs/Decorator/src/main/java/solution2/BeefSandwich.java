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
public class BeefSandwich extends Sandwich {

    public BeefSandwich() {
        description = "Beef Sandwich";
    }

    @Override
    public float cost() {
        return 5f+super.cost();
    }

}
