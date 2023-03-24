import { Color } from "../enums/color.enum";

export class Car {
    // Fields
    color: Color;

    // Constructor
    constructor(color: Color) { }

    // Functions
    getSpeed(): number {
        return 200;
    }
}