/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package problem1;

/**
 *
 * @author JEDiver
 */
public class Payment {

    public static final int CREDIT_CARD = 0;
    public static final int CHECK = 1;
    public static final int CASH = 2;
    public static final int X = 3;
    public static final int Y = 4;

    public Payment() {
    }

    public void pay(int type, float amount) {
        switch (type) {
            case CREDIT_CARD:
                payUsingCreditCard(amount);
                break;
            case CHECK:
                payUsingCheck(amount);
                break;
            case CASH:
                payInCash(amount);
                break;
            case X:
                payInX(amount);
                break;
            case Y:
                payInY(amount);
                break;
        }
    }

    private void payUsingCreditCard(float amount) {
        System.out.println("Pay using Credit Card (" + amount + ")");
    }

    private void payUsingCheck(float amount) {
        System.out.println("Pay using Check (" + amount + ")");
    }

    private void payInCash(float amount) {
        System.out.println("Pay using Cash (" + amount + ")");
    }

    private void payInX(float amount) {
        System.out.println("Pay using X (" + amount + ")");
    }
    private void payInY(float amount) {
        System.out.println("Pay using X (" + amount + ")");
    }

}
