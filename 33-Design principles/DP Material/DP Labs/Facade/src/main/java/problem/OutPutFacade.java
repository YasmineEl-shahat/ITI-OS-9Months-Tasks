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
public class OutPutFacade {

    private final PersistAdapter persistAdapter = new PersistAdapter();
    private final PrintAdapter printAdapter = new PrintAdapter();

    public void persist(UserDTO user) {
        persistAdapter.persist(user);
        printAdapter.print(user);
    }
}
