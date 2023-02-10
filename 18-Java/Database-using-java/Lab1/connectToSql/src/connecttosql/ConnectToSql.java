/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package connecttosql;


import java.sql.*;
/**
 *
 * @author AL_HRAMAIN
 */
public class ConnectToSql {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws SQLException {
        // TODO code application logic here
        try{
           DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());

           Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/adele_schema","root","asd5693");
           Statement stmt =  con.createStatement() ;
           String queryString = new String("select * from employees");
           ResultSet rs = stmt.executeQuery(queryString);
                  
            while(rs.next())
            {
                System.out.println("id: " + rs.getString(1)+" first name: " + rs.getString(2)+ " age: " + rs.getString(3) +" salary: " + rs.getString(4));
            }
            queryString = new String("insert into employees values(5, 'yasmine', 20, 25555)");
            stmt.executeUpdate(queryString);
            queryString = new String("update employees set name = 'nabila' where id = 4");
            stmt.executeUpdate(queryString);
            queryString = new String("delete from employees where id = 3");
            stmt.executeUpdate(queryString);
            queryString = new String("select * from employees");
            rs = stmt.executeQuery(queryString);
            while(rs.next())
            {
                System.out.println("id: " + rs.getString(1)+" first name: " + rs.getString(2)+ " age: " + rs.getString(3) +" salary: " + rs.getString(4));
            }
            rs.close();
            stmt.close();
            con.close();
          
        }catch(SQLException ex)
        {

            ex.printStackTrace();

        }
        
    }
    
}
