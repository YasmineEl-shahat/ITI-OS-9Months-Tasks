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
public class Main {

    public static void main(String[] args) {
        Drink drink1 = new Tea();
        drink1.prepare();
        
        drink1 =  new Coffee();
        drink1.prepare();

//        Drink drink2 = new Coffee();
//        drink2.prepare();
    }
}
