/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package rowsetexample;

import com.sun.rowset.JdbcRowSetImpl;

import java.sql.SQLException;

import java.util.logging.Level;
import java.util.logging.Logger;
import javax.sql.RowSetEvent;
import javax.sql.RowSetListener;

/**
 *
 * @author AL_HRAMAIN
 */
class MyRowSetListener implements RowSetListener {

    public void cursorMoved(RowSetEvent event) {
        System.out.println("Cursor Moved ");
    }

    public void rowChanged(RowSetEvent event) {
        System.out.println("A Row  Changed ");
    }

    @Override
    public void rowSetChanged(RowSetEvent event) {
       System.out.println("The Row set  Changed ");
    }
}

public class RowSetExample {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
            // TODO code application logic here
             MyRowSetListener rowsetListener = new MyRowSetListener();
            JdbcRowSetImpl jdbcRs = new JdbcRowSetImpl();
            jdbcRs.setUrl("jdbc:mysql://localhost:3306/adele_schema");
            jdbcRs.setUsername("root");
            jdbcRs.setPassword("asd5693");
            jdbcRs.setCommand("select * from Employees");
           
            jdbcRs.addRowSetListener(rowsetListener);
            jdbcRs.execute();
            
            
            while(jdbcRs.next())
            {
                System.out.println("id: " + jdbcRs.getString(1)+" first name: " + jdbcRs.getString(2)+ " age: " + jdbcRs.getString(3) +" salary: " + jdbcRs.getString(4));
            }
        } catch (SQLException ex) {
            Logger.getLogger(RowSetExample.class.getName()).log(Level.SEVERE, null, ex);
        }

          
    }
    
}
