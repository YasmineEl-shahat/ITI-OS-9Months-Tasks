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
public class Main {

    public static void main(String[] args) {
        Payment payment = new Payment(new CheckStrategy());
        payment.pay(1000000);
    }
}
