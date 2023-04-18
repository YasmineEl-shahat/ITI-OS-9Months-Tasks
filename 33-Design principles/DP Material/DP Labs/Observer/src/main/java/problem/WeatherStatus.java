/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package problem;

/**
 *
 * @author JEDiver
 */
public class WeatherStatus {

    private Display1 display1;
    private Display2 display2;
    private Display3 display3;
    private Display4 display4;
    
    
    private float temperature;
    private float pressure;
    private float humidity;

    public WeatherStatus(Display1 display1, Display2 display2, Display3 display3, Display4 display4) {
        this.display1 = display1;
        this.display2 = display2;
        this.display3 = display3;
        this.display4 = display4;
    }

    public void weatherChanged() {
        if (display1 != null) {
            display1.update(temperature, pressure, humidity);
        }
        if (display2 != null) {
            display2.update(temperature, pressure, humidity);
        }
        if (display3 != null) {
            display3.update(temperature, pressure, humidity);
        }
        if (display4 != null) {
            display4.update(temperature, pressure, humidity);
        }

    }

    public float getTemperature() {
        return temperature;
    }

    public void setTemperature(float temperature) {
        this.temperature = temperature;
    }

    public float getPressure() {
        return pressure;
    }

    public void setPressure(float pressure) {
        this.pressure = pressure;
    }

    public float getHumidity() {
        return humidity;
    }

    public void setHumidity(float humidity) {
        this.humidity = humidity;
    }

}
