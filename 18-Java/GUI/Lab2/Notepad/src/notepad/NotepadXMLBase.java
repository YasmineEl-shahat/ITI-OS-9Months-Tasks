package notepad;


import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.util.Optional;
import java.util.Scanner;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Platform;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuBar;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TextArea;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.input.KeyCodeCombination;
import javafx.scene.layout.BorderPane;
import javafx.scene.input.KeyCode;
import javafx.scene.input.KeyCombination;
import javafx.stage.FileChooser;



public  class NotepadXMLBase extends BorderPane {

    protected final MenuBar menuBar;
    protected final Menu fileMenu;
    protected final MenuItem newItem;
    protected final MenuItem openItem;
    protected final MenuItem saveItem;
    protected final MenuItem exitItem;
    protected final Menu editMenu;
    protected final MenuItem cutItem;
    protected final MenuItem copyItem;
    protected final MenuItem pasteItem;
    protected final MenuItem deleteItem;
    protected final MenuItem selectItem;
    protected final Menu helpMenu;
    protected final MenuItem abouttem;
    protected final TextArea textArea;

    public NotepadXMLBase() {

        menuBar = new MenuBar();
        fileMenu = new Menu();
        newItem = new MenuItem();
        openItem = new MenuItem();
        saveItem = new MenuItem();
        exitItem = new MenuItem();
        editMenu = new Menu();
        cutItem = new MenuItem();
        copyItem = new MenuItem();
        pasteItem = new MenuItem();
        deleteItem = new MenuItem();
        selectItem = new MenuItem();
        helpMenu = new Menu();
        abouttem = new MenuItem();
        textArea = new TextArea();

        setMaxHeight(USE_PREF_SIZE);
        setMaxWidth(USE_PREF_SIZE);
        setMinHeight(USE_PREF_SIZE);
        setMinWidth(USE_PREF_SIZE);
        setPrefHeight(400.0);
        setPrefWidth(600.0);

        BorderPane.setAlignment(menuBar, javafx.geometry.Pos.CENTER);

        fileMenu.setMnemonicParsing(false);
        fileMenu.setText("File");

        newItem.setMnemonicParsing(false);
        newItem.setText("new");
        newItem.setAccelerator(new KeyCodeCombination(KeyCode.N, KeyCombination.CONTROL_DOWN));
        newItem.setOnAction(event -> {
            if(!textArea.getText().equals("")){
                Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
                alert.setTitle("Do you want to save the file");
                alert.setHeaderText("Do you want to save the file");
                Optional<ButtonType> result = alert.showAndWait();
                if(result.get() == ButtonType.OK) {
                    saveFile();
                    textArea.clear();
                }else textArea.clear();
            }else textArea.clear();
                });
 
        openItem.setMnemonicParsing(false);
        openItem.setText("open");
        openItem.setAccelerator(new KeyCodeCombination(KeyCode.O, KeyCombination.CONTROL_DOWN));
        openItem.setOnAction((ActionEvent)->{
            if(!textArea.getText().equals("")){
                Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
                alert.setTitle("Do you want to save the file");
                alert.setHeaderText("Do you want to save the file");
                Optional<ButtonType> result = alert.showAndWait();
                if(result.get() == ButtonType.OK) {
                    saveFile();
                    textArea.clear();
                }else openFile();
            }else openFile();
        });
        saveItem.setMnemonicParsing(false);
        saveItem.setText("save");
        saveItem.setAccelerator(new KeyCodeCombination(KeyCode.S, KeyCombination.CONTROL_DOWN));
        saveItem.setOnAction(ActionEvent->{
            saveFile();

        });

        exitItem.setMnemonicParsing(false);
        exitItem.setText("exit");
        exitItem.setAccelerator(new KeyCodeCombination(KeyCode.E, KeyCombination.CONTROL_DOWN));
        exitItem.setOnAction((event) -> Platform.exit());
        editMenu.setMnemonicParsing(false);
        editMenu.setText("Edit");

        cutItem.setMnemonicParsing(false);
        cutItem.setText("cut");
        cutItem.setOnAction((event) -> textArea.cut());
        
        copyItem.setMnemonicParsing(false);
        copyItem.setText("copy");
        copyItem.setOnAction((event) -> textArea.copy());

        pasteItem.setMnemonicParsing(false);
        pasteItem.setText("paste");
        pasteItem.setOnAction((event) -> textArea.paste()); 
        
        deleteItem.setMnemonicParsing(false);
        deleteItem.setText("Delete");
        deleteItem.setOnAction(event -> textArea.deleteText(textArea.getSelection()));
        
        selectItem.setMnemonicParsing(false);
        selectItem.setText("select all");
        selectItem.setOnAction(event -> textArea.selectAll());
        
        helpMenu.setMnemonicParsing(false);
        helpMenu.setText("Help");

        abouttem.setMnemonicParsing(false);
        abouttem.setText("About");
        abouttem.setOnAction( (e)-> {
                    Alert alert = new Alert(Alert.AlertType.INFORMATION);
                    Image image = new Image(getClass().getResource("image.jpg").toExternalForm());
                    ImageView imageView = new ImageView(image);
                    alert.setGraphic(imageView);
                    alert.setTitle("About Notepad");
                    alert.setHeaderText("Notepad made by Yasmine");
                    alert.showAndWait();
            });
        setTop(menuBar);

        BorderPane.setAlignment(textArea, javafx.geometry.Pos.CENTER);
        textArea.setPrefHeight(200.0);
        textArea.setPrefWidth(200.0);
        setCenter(textArea);

        fileMenu.getItems().add(newItem);
        fileMenu.getItems().add(openItem);
        fileMenu.getItems().add(saveItem);
        fileMenu.getItems().add(exitItem);
        menuBar.getMenus().add(fileMenu);
        editMenu.getItems().add(cutItem);
        editMenu.getItems().add(copyItem);
        editMenu.getItems().add(pasteItem);
        editMenu.getItems().add(deleteItem);
        editMenu.getItems().add(selectItem);
        menuBar.getMenus().add(editMenu);
        helpMenu.getItems().add(abouttem);
        menuBar.getMenus().add(helpMenu);

    }

    private void saveFile() {
        FileChooser fc = new  FileChooser();
        FileChooser.ExtensionFilter ext = new FileChooser.ExtensionFilter("Text files(*.txt)", "*.txt");
        File savefile = fc.showSaveDialog(null);
        try{
            FileWriter fw = new FileWriter(savefile);
            fw.write(textArea.getText());
            fw.close();
        }
        catch(Exception ex){
            System.out.print(ex.getMessage());
        }
    }
    private void openFile() {
        FileChooser fileChooser = new FileChooser();
        //only allow text files to be selected using chooser
        fileChooser.getExtensionFilters().add(
                new FileChooser.ExtensionFilter("Text files (*.txt)", "*.txt")
        );
        //set initial directory somewhere user will recognise
        fileChooser.setInitialDirectory(new File(System.getProperty("user.home")));
        //let user select file
        File fileToLoad = fileChooser.showOpenDialog(null);
        //if file has been chosen, load it
        if(fileToLoad != null){
             try {
                 Scanner scanner = new Scanner(fileToLoad);
                 while(scanner.hasNextLine()){
                     String line = scanner.nextLine();
                     textArea.appendText(line + "");
                 }
             } catch (FileNotFoundException ex) {
                  Alert alert = new Alert(Alert.AlertType.WARNING);
                 alert.setTitle("No file found");
                 alert.showAndWait();
             }
         }
    }
}
