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
public class SeafoodPizza extends Pizza {

    @Override
    public void prepare() {
        System.out.println("Preparing Seafood Pizza");
    }

    @Override
    public void bake() {
        System.out.println("Baking Seafood Pizza");
    }

    @Override
    public void cut() {
        System.out.println("Cut Seafood Pizza");
    }

    @Override
    public void box() {
        System.out.println("boxing Seafood Pizza");
    }

}
