/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package viewdatagui;

import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;

/**
 *
 * @author AL_HRAMAIN
 */
public class ViewDataGUI extends Application {
    
    @Override
    public void start(Stage primaryStage) {
        TableDataFXMLBase tableFrame = new TableDataFXMLBase();
        
        StackPane root = new StackPane();
        root.getChildren().add(tableFrame);
        
        Scene scene = new Scene(root, 600, 500);
        
        primaryStage.setTitle("Person Table:");
        primaryStage.setScene(scene);
        primaryStage.show();
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
