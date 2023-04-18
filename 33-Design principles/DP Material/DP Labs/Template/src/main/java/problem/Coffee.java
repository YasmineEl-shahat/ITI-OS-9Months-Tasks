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
public class Coffee {

    public void prepare() {
        boilWater();
        putcoffee();
        addSugar();
    }

    private void boilWater() {
        System.out.println("Boil Water");
    }

    private void putcoffee() {
        System.out.println("Put Coffee bag");
    }

    private void addSugar() {
        System.out.println("Add sugar");
    }

}
