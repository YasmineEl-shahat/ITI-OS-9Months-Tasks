/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author JEDiver
 */
public class dbc {
    
    private dbc() {
    }
    
    public static dbc getInstance() {
        return dbcHolder.INSTANCE;
    }
    
    private static class dbcHolder {

        private static final dbc INSTANCE = new dbc();
    }
}
