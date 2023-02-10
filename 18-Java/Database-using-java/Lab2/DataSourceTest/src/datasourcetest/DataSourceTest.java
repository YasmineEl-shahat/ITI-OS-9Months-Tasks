/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package datasourcetest;

/**
 *
 * @author AL_HRAMAIN
 */

import com.mysql.cj.jdbc.MysqlDataSource;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.sql.Statement;
import java.sql.SQLException;
import java.util.Properties;
import javax.sql.DataSource;
import java.sql.Connection;
import java.sql.ResultSet;

class MyDataSourceFactory {
    public static DataSource getMySQLDataSource () {

        Properties props = new Properties();
        FileInputStream fis = null;
        MysqlDataSource mysqlDS = null;
        try {

            fis = new FileInputStream("db.properties");
            props.load(fis);
            mysqlDS = new MysqlDataSource();
            // get the properties value
            mysqlDS.setURL(props.getProperty("MYSQL_DB_URL"));
            mysqlDS.setUser(props.getProperty("MYSQL_DB_USERNAME"));
            mysqlDS.setPassword(props.getProperty("MYSQL_DB_PASSWORD"));

        } catch (IOException e) {
            e.printStackTrace();
        }

        return mysqlDS;

        }
}
public class DataSourceTest {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
//        Properties prop = new Properties();
//        OutputStream output = null;
//        try {
//            output = new FileOutputStream("db.properties");
//            // set the properties value
//            prop.setProperty("MYSQL_DB_URL","jdbc:mysql://localhost:3306/adele_schema");
//            prop.setProperty("MYSQL_DB_USERNAME", "root");
//            prop.setProperty("MYSQL_DB_PASSWORD", "asd5693");
//            // save properties to project folder
//            prop.store(output, null);
//
//        } catch (IOException io) {
//            io.printStackTrace();
//
//        } finally {
//
//            if (output != null) {
//
//                try {
//
//                    output.close();
//                } catch (IOException e) {
//                    e.printStackTrace();
//
//                }
//
//            }
//
//        }
        testDataSource();
    }
    private static void testDataSource() {

        DataSource ds = null;
        ds = MyDataSourceFactory.getMySQLDataSource();
        Connection con = null;
        Statement stmt = null;
        ResultSet rs = null;
        try { 
            con = ds.getConnection();
            stmt = con.createStatement();
            rs = stmt.executeQuery("select * from employees");
            while(rs.next()){
                System.out.println("ID="+rs.getInt("id")+",name="+rs.getString("name")+",age="+rs.getInt("age"));
            }
        }catch (SQLException e) {
            e.printStackTrace();

        }finally{
            try {

                if(rs != null) rs.close();
                if(stmt != null) stmt.close();
                if(con != null) con.close();

            } catch (SQLException e) {
                 e.printStackTrace();

            }
        }
   }
}
