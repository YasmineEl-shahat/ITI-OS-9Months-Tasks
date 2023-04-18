/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package solution;

/**
 *
 * @author JEDiver
 */
public abstract class Drink {

    public void prepare() {
        boilWater();
        putIngredient();
        addSugar();
    }

    private void boilWater() {
        System.out.println("Boil Water");
    }

    private void addSugar() {
        System.out.println("Add sugar");
    }

    protected abstract void putIngredient();

}
