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
public class VegetablePizza extends Pizza {

    @Override
    public void prepare() {
        System.out.println("Preparing Vegetable Pizza");
    }

    @Override
    public void bake() {
        System.out.println("Baking Vegetable Pizza");
    }

    @Override
    public void cut() {
        System.out.println("Cut Vegetable Pizza");
    }

    @Override
    public void box() {
        System.out.println("boxing Vegetable Pizza");
    }

}
