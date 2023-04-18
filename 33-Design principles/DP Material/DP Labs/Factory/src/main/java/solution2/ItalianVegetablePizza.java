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
public class ItalianVegetablePizza extends Pizza {

    @Override
    public void prepare() {
        System.out.println("Preparing Italian Vegetable Pizza");
    }

    @Override
    public void bake() {
        System.out.println("Baking Italian Vegetable Pizza");
    }

    @Override
    public void cut() {
        System.out.println("Cut Italian Vegetable Pizza");
    }

    @Override
    public void box() {
        System.out.println("boxing Italian Vegetable Pizza");
    }

}
