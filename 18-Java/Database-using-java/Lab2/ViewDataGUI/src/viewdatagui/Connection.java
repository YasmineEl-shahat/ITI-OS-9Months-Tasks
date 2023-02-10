/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package viewdatagui;


import java.sql.*;  
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author AL_HRAMAIN
 */
public class Connection {
    private java.sql.Connection con;
    Connection ()
    {
        try {
            DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/adele_schema","root","asd5693");
        } catch (SQLException ex) {
            Logger.getLogger(Connection.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    ResultSet createSt()
    {
        Statement stmt ;
        ResultSet rs = null;
        try {
            stmt = con.createStatement(
            ResultSet.TYPE_SCROLL_SENSITIVE,
            ResultSet.CONCUR_UPDATABLE);

//            stmt = con.createStatement();
            
            String queryString = new String("select * from persons");
            rs = stmt.executeQuery(queryString);
         
                       
         
         
             return rs;
        } catch (SQLException ex) {
            Logger.getLogger(Connection.class.getName()).log(Level.SEVERE, null, ex);
        }
        return rs;
    }
    void updateStatement(String queryString)
    {
        Statement stmt ;
        try { 
            stmt = con.createStatement();
            
            stmt.executeUpdate(queryString);
        } catch (SQLException ex) {
            Logger.getLogger(Connection.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
