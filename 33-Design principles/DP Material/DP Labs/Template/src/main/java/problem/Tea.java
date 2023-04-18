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
public class Tea {

    public void prepare() {
        boilWater();
        putTeaBag();
        addSugar();
    }

    private void boilWater() {
        System.out.println("Boil Water");
    }

    private void putTeaBag() {
        System.out.println("Put tea bag");
    }

    private void addSugar() {
        System.out.println("Add sugar");
    }

}
