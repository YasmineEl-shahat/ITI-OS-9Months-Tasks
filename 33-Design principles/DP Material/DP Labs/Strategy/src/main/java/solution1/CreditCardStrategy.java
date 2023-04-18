/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package solution1;

/**
 *
 * @author JEDiver
 */
public class CreditCardStrategy implements PaymentStrategy {

    @Override
    public void doPayment(float amount) {
        System.out.println("Pay using Credit Card (" + amount + ")");
    }

}
