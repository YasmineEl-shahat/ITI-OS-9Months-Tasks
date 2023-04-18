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
        Connection connection = Connection.getInstance();
        
        
        
        connection.sayHello("Moamen");
        Connection connection2 = Connection.getInstance();
        System.out.println(connection);
        System.out.println(connection2);
    }
}
