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
public class Main {

    public static void main(String[] args) {
        Sandwich sandwich = new ChickenSandwich();
        sandwich.setCheeseCost(15f);
        sandwich.setKetchupCost(0f);
        sandwich.setMashCost(11f);
        System.out.println(sandwich.getDescription());
        System.out.println(sandwich.cost());
    }
}
