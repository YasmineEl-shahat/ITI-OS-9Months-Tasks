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
public class Sandwich {

    private boolean cheese, ketchup, mash;
    private float cheeseCost, ketchupCost, mashCost;

    public String getDescription() {
        return "Empty Sandwich";
    }

    public float cost() {
        float condimentCost = 5f;
        if (cheese) {
            condimentCost += cheeseCost;
        }
        if (ketchup) {
            condimentCost += ketchupCost;
        }
        if (mash) {
            condimentCost += mashCost;
        }
        return condimentCost;
    }

    public float getCheeseCost() {
        return cheeseCost;
    }

    public void setCheeseCost(float cheeseCost) {
        this.cheeseCost = cheeseCost;
        cheese = true;
    }

    public float getKetchupCost() {
        return ketchupCost;
    }

    public void setKetchupCost(float ketchupCost) {
        this.ketchupCost = ketchupCost;
        ketchup = true;
    }

    public float getMashCost() {
        return mashCost;
    }

    public void setMashCost(float mashCost) {
        this.mashCost = mashCost;
        mash = true;
    }

}
