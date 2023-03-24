// Data Types:

//#region Built-in Types
// Number
let age: number = 25;
age = 25.5;

// String
let firstName: string = 'John';
firstName = '40';
let fullName = 'John Smith';
fullName = "John Smith";
fullName = `${firstName} Smith`;

// Boolean
let isMarried = true;

// Function
let fn: Function = () => console.log('Hi');

// Object
let obj: Object = {
    name: 'Samy'
};

//#endregion

//#region  User defined Types
// Classes, Enums, Interfaces
class Student { }
let std1: Student = null;

interface IFlyable { }
let bird: IFlyable;

enum Color { }
let carColor: Color;
//#endregion

//#region  Any Type
let changing: any = 'John';
changing = 50;
changing = true;
changing = [];
//#endregion

let change: number | boolean;
change = 2;
change = false;
// change = ''; // Error