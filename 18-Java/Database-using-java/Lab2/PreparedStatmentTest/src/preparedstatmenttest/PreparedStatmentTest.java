/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package preparedstatmenttest;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.PreparedStatement;
import java.util.logging.Level;
import java.util.logging.Logger;


/**
 *
 * @author AL_HRAMAIN
 */
public class PreparedStatmentTest {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
            // TODO code application logic here
            DriverManager.registerDriver(new com.mysql.cj.jdbc.Driver());
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/adele_schema","root","asd5693");
            // 1. Create SQL statement with placeholders.
            String SQL = "INSERT INTO Employee (Id, F_Name, L_Name, Gender, Age, Address, Phone_Number, Vaction_Balance) "
                    + "VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            // 2. Create PrepareStatement object
            PreparedStatement pstmt = con.prepareStatement(SQL);
            // 3. Turn off auto-commit
            con.setAutoCommit( false );
            // 4.a. Set the variables
            String fnames[]= {"Yasmine","Mariam","Rawan","Ahmed","Mohamed"};
            String lnames[]= {"El-shahat","Zayed","Gamal","Mohamed","Ahmed"};
            String gender[] = {"f", "f", "f", "m", "m"};
            int ages[] = {23, 22, 30, 45, 47};
//            for(int i = 1; i <= 5; i++)
//            {
//                pstmt.setInt(1, i);
//                pstmt.setString(2, fnames[i-1]);
//                pstmt.setString(3, lnames[i-1]);
//                pstmt.setString(4, gender[i-1]);
//                pstmt.setInt(5, ages[i - 1] );
//                pstmt.setString(6, "Gomhoria street" );
//                pstmt.setString(7, "5959562622262" );
//                pstmt.setInt(8,  30);
//                pstmt.addBatch();
//            }
//            SQL = "UPDATE Employee SET Vaction_Balance = ? WHERE AGE >= ?";
//            pstmt = con.prepareStatement(SQL);
//            pstmt.setInt(1, 45);
//            pstmt.setInt(2, 45);
//            pstmt.addBatch();
            SQL = "UPDATE Employee SET F_Name = CONCAT(?,F_Name) WHERE Gender = ?";
            pstmt = con.prepareStatement(SQL);
            pstmt.setString(1,  "MRS/");
            pstmt.setString(2,  "f");
            pstmt.addBatch();
            pstmt.setString(1,  "MR/");
            pstmt.setString(2,  "m");
            pstmt.addBatch();
            // 5. Execute the and hold the returned values
            int[] count = pstmt.executeBatch();

            // 6. Explicitly commit statements to apply changes
            con.commit();
            
        } catch (SQLException ex) {
            Logger.getLogger(PreparedStatmentTest.class.getName()).log(Level.SEVERE, null, ex);
        }

          
    }
    
}
