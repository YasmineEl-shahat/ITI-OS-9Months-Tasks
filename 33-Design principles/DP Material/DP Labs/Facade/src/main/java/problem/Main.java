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
public class Main {

    public static void main(String[] args) {

        ViewService viewService = new ViewService();
        UserDTO user = viewService.getUser();
//        PersistAdapter persistAdapter = new PersistAdapter();
//        PrintAdapter printAdapter = new PrintAdapter();
//        
//        persistAdapter.persist(user);
//        printAdapter.print(user);
        
        OutPutFacade persistFacade = new OutPutFacade();
        persistFacade.persist(user);
    }

}
