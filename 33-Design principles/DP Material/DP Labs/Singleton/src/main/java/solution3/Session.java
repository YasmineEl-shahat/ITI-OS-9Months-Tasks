/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package solution3;

/**
 *
 * @author JEDiver
 */
public class Session {
    private static final Session INSTANCE = new Session();
    private Session() {
    }
    
    public static Session getInstance() {
        return INSTANCE;
    }
    
}
