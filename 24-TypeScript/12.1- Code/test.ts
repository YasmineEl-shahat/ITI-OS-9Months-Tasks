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


// Return Types
const greeting = (name: string): void => console.log(`Hello ${name}`);
const greeting2 = (name: string): string => {
    return `Hello ${name}`
};
const greeting3 = (name: string): string => `Hello ${name}`;

function sayHi(name: string): void {
    alert('Hi' + name);
}

const value = greeting('Hana');
console.log(value); // undefined

const value2 = greeting2('John');
console.log(value2);
