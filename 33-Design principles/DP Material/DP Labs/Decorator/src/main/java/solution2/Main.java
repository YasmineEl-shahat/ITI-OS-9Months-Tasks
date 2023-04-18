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
public class Main {

    public static void main(String[] args) {
        Sandwich sandwich = new BeefSandwich();
//        sandwich =   new ChickenSandwich(sandwich);
        sandwich = new Cheese(sandwich);
        sandwich = new Ketchup(sandwich);
        sandwich = new Cheese(sandwich);
        sandwich = new Mashroum(sandwich);
//        sandwich = new Cheese(sandwich);
//        sandwich = new xxx(sandwich);
        
        System.out.println(sandwich.getDescription());
      System.out.println(sandwich.cost() + "LE");



//        Sandwich sandwich2 = new BeefSandwich();
//        sandwich2 = new Cheese(sandwich2);
//        sandwich2 = new Ketchup(sandwich2);
//        System.out.println(sandwich2.getDescription());
//        System.out.println(sandwich2.cost() + "LE");

    }
}
