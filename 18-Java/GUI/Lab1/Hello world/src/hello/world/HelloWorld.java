/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package hello.world;

import javafx.scene.paint.Color;
import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;
import javafx.scene.paint.LinearGradient;
import javafx.scene.paint.Stop;
import javafx.scene.text.Font;
import javafx.scene.text.Text;
import javafx.scene.effect.Reflection;
import javafx.scene.paint.CycleMethod;

/**
 *
 * @author AL_HRAMAIN
 */
public class HelloWorld extends Application {
    
    @Override
    public void start(Stage primaryStage) {
        Text text = new Text("Hello World");
        text.setFill(Color.RED);
        text.setFont(Font.font ("Verdana", 20));
        Reflection reflection = new Reflection();
        reflection.setFraction(0.8);
        text.setEffect(reflection);
        
      
        
        StackPane root = new StackPane();
        root.getChildren().add(text);
         root.setId("scene");
       
       
        Stop[] stops = new Stop[] { new Stop(0, Color.BLACK), new Stop(0.5, Color.WHITE),new Stop(1, Color.BLACK)};
        LinearGradient lg1 = new LinearGradient(0, 0, 0, 1,true, CycleMethod.NO_CYCLE ,stops);
           Scene scene = new Scene(root, 300, 250, lg1);
//         Scene scene = new Scene(root, 300, 250);
//        scene.getStylesheets().add(getClass().getResource("style.css").toString()) ;
        primaryStage.setTitle("Hello World!");
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
