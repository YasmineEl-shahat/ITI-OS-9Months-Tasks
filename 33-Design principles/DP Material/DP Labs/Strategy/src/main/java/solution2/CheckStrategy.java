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
public class CheckStrategy implements PaymentStrategy {

    @Override
    public void doPayment(float amount) {
        System.out.println("Pay using Check (" + amount + ")");
    }

}
