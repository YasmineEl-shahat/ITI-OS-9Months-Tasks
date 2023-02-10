package viewdatagui;


import java.sql.*;  

import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;
import javafx.scene.layout.Pane;

public class TableDataFXMLBase extends Pane {

    protected final Button newBtn;
    protected final Button updateBtn;
    protected final Button deleteBtn;
    protected final Button firstBtn;
    protected final Button previousBtn;
    protected final Button nextBtn;
    protected final Button lastBtn;
    protected final Label label;
    protected final Label label0;
    protected final Label label1;
    protected final Label label2;
    protected final Label label3;
    protected final Label label4;
    protected final TextField idText;
    protected final TextField firstText;
    protected final TextField middleText;
    protected final TextField lastText;
    protected final TextField emailText;
    protected final TextField phoneText;
   
    public TableDataFXMLBase() {
        Connection con = new Connection();
        ResultSet rs =  con.createSt();
        newBtn = new Button();
        updateBtn = new Button();
        deleteBtn = new Button();
        firstBtn = new Button();
        previousBtn = new Button();
        nextBtn = new Button();
        lastBtn = new Button();
        label = new Label();
        label0 = new Label();
        label1 = new Label();
        label2 = new Label();
        label3 = new Label();
        label4 = new Label();
        idText = new TextField();
        firstText = new TextField();
        middleText = new TextField();
        lastText = new TextField();
        emailText = new TextField();
        phoneText = new TextField();

        setMaxHeight(USE_PREF_SIZE);
        setMaxWidth(USE_PREF_SIZE);
        setMinHeight(USE_PREF_SIZE);
        setMinWidth(USE_PREF_SIZE);
        setPrefHeight(400.0);
        setPrefWidth(600.0);

        newBtn.setLayoutX(140.0);
        newBtn.setLayoutY(334.0);
        newBtn.setMnemonicParsing(false);
        newBtn.setText("new");
        newBtn.setOnAction(ActionEvent -> {
            idText.clear();
            firstText.clear();
            middleText.clear();
            lastText.clear();
            emailText.clear();
            phoneText.clear();
        });
        
        updateBtn.setLayoutX(221.0);
        updateBtn.setLayoutY(334.0);
        updateBtn.setMnemonicParsing(false);
        updateBtn.setText("update");
        updateBtn.setOnAction(ActionEvent -> {
            String queryString = new String("update persons set fname ="+(String)firstText.getText() 
                    + ", mname = " +(String)middleText.getText()  + ", lname = " +(String)lastText.getText() 
                    + ", email = " +(String)emailText.getText()  + ",  phone = " +(String)phoneText.getText() +"where id = "+idText.getText() 
            );
            con.updateStatement(queryString);
            
        });
        deleteBtn.setLayoutX(298.0);
        deleteBtn.setLayoutY(334.0);
        deleteBtn.setMnemonicParsing(false);
        deleteBtn.setText("delete");
        deleteBtn.setOnAction(ActionEvent -> {
            String queryString = new String("delete from persons where id = "+idText.getText());
            con.updateStatement(queryString);
            idText.clear();
            firstText.clear();
            middleText.clear();
            lastText.clear();
            emailText.clear();
            phoneText.clear();
        });
        firstBtn.setLayoutX(367.0);
        firstBtn.setLayoutY(334.0);
        firstBtn.setMnemonicParsing(false);
        firstBtn.setText("first");
        firstBtn.setOnAction(ActionEvent -> {
            
           try {
                System.out.println("fff");
                rs.first();
                setDataIntoFrame(rs);
             
            } catch (Exception ex) {
                Logger.getLogger(TableDataFXMLBase.class.getName()).log(Level.SEVERE, null, ex);
            }
        });
        
        previousBtn.setLayoutX(448.0);
        previousBtn.setLayoutY(334.0);
        previousBtn.setMnemonicParsing(false);
        previousBtn.setText("previous");
        previousBtn.setOnAction(ActionEvent -> {            
            try {
                rs.previous();
                setDataIntoFrame(rs);
            } catch (SQLException ex) {
                Logger.getLogger(TableDataFXMLBase.class.getName()).log(Level.SEVERE, null, ex);
            }
          
        });
 
        nextBtn.setLayoutX(525.0);
        nextBtn.setLayoutY(334.0);
        nextBtn.setMnemonicParsing(false);
        nextBtn.setText("next");
        nextBtn.setOnAction(ActionEvent -> {
            
            try {
                rs.next();
                setDataIntoFrame(rs);
            } catch (SQLException ex) {
                Logger.getLogger(TableDataFXMLBase.class.getName()).log(Level.SEVERE, null, ex);
            }          
        });

        lastBtn.setLayoutX(70.0);
        lastBtn.setLayoutY(334.0);
        lastBtn.setMnemonicParsing(false);
        lastBtn.setText("last");
        lastBtn.setOnAction(ActionEvent -> {
            
            try {
                rs.last();
                setDataIntoFrame(rs);
            } catch (SQLException ex) {
                Logger.getLogger(TableDataFXMLBase.class.getName()).log(Level.SEVERE, null, ex);
            }
        });

        label.setLayoutX(21.0);
        label.setLayoutY(88.0);
        label.setText("ID");

        label0.setLayoutX(22.0);
        label0.setLayoutY(126.0);
        label0.setPrefHeight(17.0);
        label0.setPrefWidth(79.0);
        label0.setText("First Name");

        label1.setLayoutX(22.0);
        label1.setLayoutY(167.0);
        label1.setText("Middle Name");

        label2.setLayoutX(22.0);
        label2.setLayoutY(200.0);
        label2.setPrefHeight(25.0);
        label2.setPrefWidth(72.0);
        label2.setText("Last Name");

        label3.setLayoutX(27.0);
        label3.setLayoutY(238.0);
        label3.setPrefHeight(25.0);
        label3.setPrefWidth(72.0);
        label3.setText("Email");

        label4.setLayoutX(27.0);
        label4.setLayoutY(274.0);
        label4.setPrefHeight(25.0);
        label4.setPrefWidth(72.0);
        label4.setText("Phone");

        idText.setLayoutX(115.0);
        idText.setLayoutY(84.0);
        idText.setPrefHeight(25.0);
        idText.setPrefWidth(93.0);

        firstText.setLayoutX(115.0);
        firstText.setLayoutY(163.0);

        middleText.setLayoutX(115.0);
        middleText.setLayoutY(122.0);
        middleText.setPrefHeight(25.0);
        middleText.setPrefWidth(165.0);

        lastText.setLayoutX(115.0);
        lastText.setLayoutY(199.0);

        emailText.setLayoutX(115.0);
        emailText.setLayoutY(278.0);
        emailText.setPrefHeight(25.0);
        emailText.setPrefWidth(204.0);

        phoneText.setLayoutX(115.0);
        phoneText.setLayoutY(237.0);
        phoneText.setPrefHeight(25.0);
        phoneText.setPrefWidth(286.0);

        getChildren().add(newBtn);
        getChildren().add(updateBtn);
        getChildren().add(deleteBtn);
        getChildren().add(firstBtn);
        getChildren().add(previousBtn);
        getChildren().add(nextBtn);
        getChildren().add(lastBtn);
        getChildren().add(label);
        getChildren().add(label0);
        getChildren().add(label1);
        getChildren().add(label2);
        getChildren().add(label3);
        getChildren().add(label4);
        getChildren().add(idText);
        getChildren().add(firstText);
        getChildren().add(middleText);
        getChildren().add(lastText);
        getChildren().add(emailText);
        getChildren().add(phoneText);
        
    }
    void setDataIntoFrame(ResultSet rs){
        try {
                idText.setText((rs.getString("id")));
                firstText.setText((rs.getString("fname")));
                middleText.setText((rs.getString("mname")));
                lastText.setText((rs.getString("lname")));
                emailText.setText((rs.getString("email")));
                phoneText.setText((rs.getString("phone")));
            } catch (SQLException ex) {
                Logger.getLogger(TableDataFXMLBase.class.getName()).log(Level.SEVERE, null, ex);
            }
      }
}
