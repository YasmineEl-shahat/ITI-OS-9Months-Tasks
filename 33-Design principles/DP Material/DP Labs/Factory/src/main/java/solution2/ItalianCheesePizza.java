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
public class ItalianCheesePizza extends Pizza {

    @Override
    public void prepare() {
        System.out.println("Preparing Italian Cheese Pizza");
    }

    @Override
    public void bake() {
        System.out.println("Baking Italian Cheese Pizza");
    }

    @Override
    public void cut() {
        System.out.println("Cut Italian Cheese Pizza");
    }

    @Override
    public void box() {
        System.out.println("boxing Italian Cheese Pizza");
    }

}
