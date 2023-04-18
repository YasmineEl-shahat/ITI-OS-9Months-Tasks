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
public class Main {

    public static void main(String[] args) {
        WeatherStatus weatherStatus = new WeatherStatus();
        weatherStatus.registerObserver(new Display1());
        weatherStatus.registerObserver(new Display2());
        weatherStatus.registerObserver(new Display4());
        weatherStatus.setTemperature(12.5f);
        weatherStatus.setPressure(11.5f);
        weatherStatus.setHumidity(22.4f);
        weatherStatus.notifyObservers();
    }
}
