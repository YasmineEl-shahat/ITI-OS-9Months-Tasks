/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package webrowset;

import com.sun.rowset.WebRowSetImpl;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;



/**
 *
 * @author AL_HRAMAIN
 */
public class WebRowSet {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws FileNotFoundException, IOException {
        try {
            // TODO code application logic here

            WebRowSetImpl wrst = new WebRowSetImpl();
            wrst.setUrl("jdbc:mysql://localhost:3306/adele_schema");
            wrst.setUsername("root");
            wrst.setPassword("asd5693");
            wrst.setCommand("select id, name from Employees");
            wrst.execute();
            while(wrst.next())
            {
                System.out.println("id: " + wrst.getString(1)+" first name: " + wrst.getString(2));
            }
            FileOutputStream out = new FileOutputStream("emplist.xml");
            wrst.writeXml(out);
               
           
        } catch (SQLException ex) {
            Logger.getLogger(WebRowSet.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
