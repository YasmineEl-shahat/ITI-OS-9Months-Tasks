/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package solution1;

/**
 *
 * @author JEDiver
 */
public class Display4 implements Observer {

    @Override
    public void update(float temperature, float pressure, float humidity) {
        System.out.println("============================");
        System.out.println("Display (4)");
        System.out.println("Temperature:" + temperature);
        System.out.println("Pressure:" + pressure);
        System.out.println("Humidity:" + humidity);
        System.out.println("============================");
    }
}
