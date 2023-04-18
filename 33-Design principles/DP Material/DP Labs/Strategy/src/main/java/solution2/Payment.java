/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package solution2;

import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author JEDiver
 */
public class Payment {

    public PaymentStrategy paymentStrategy;

    public Payment(Class paymentStrategyClass) {
        try {
            this.paymentStrategy = (PaymentStrategy) paymentStrategyClass.newInstance();
        } catch (InstantiationException ex) {
            Logger.getLogger(Payment.class.getName()).log(Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            Logger.getLogger(Payment.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void pay(float amount) {
        paymentStrategy.doPayment(amount);
    }
}
