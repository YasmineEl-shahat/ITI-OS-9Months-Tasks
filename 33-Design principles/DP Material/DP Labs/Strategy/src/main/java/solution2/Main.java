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
public class Main {

    public static void main(String[] args) {
        Payment payment = new Payment(CreditCardStrategy.class);
//        Payment payment = new Payment(CheckStrategy.class);
        payment.pay(1000);
    }
}
