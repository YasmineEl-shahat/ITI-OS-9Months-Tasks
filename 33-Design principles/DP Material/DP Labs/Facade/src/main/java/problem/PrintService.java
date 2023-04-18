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
public class PrintService {

    public void print(UserEntity user) {
        System.out.println("===========================");
        System.out.println("Print Service");
        System.out.println(user.getFullName());
        System.out.println(user.getNetSalary());
        System.out.println("===========================");
    }
}
