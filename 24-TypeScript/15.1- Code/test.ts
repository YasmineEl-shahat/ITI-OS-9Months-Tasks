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


// Generics
function identity(arg: number): number {
    return arg;
}

let output = identity(33);

function identity2(arg: string): string {
    return arg;
}

let output2 = identity2('string');

function identity3(arg: any): any {
    return arg;
}

let output3 = identity3([]);

function genericIdentity<T>(arg: T): T {
    return arg;
}

const o4 = genericIdentity<boolean>(true);
const o5 = genericIdentity<string>('myString');


// Enum
// enum Color { red, green, blue }

// let color: Color = Color.green;
// console.log(color); // ==> 1

// color = Color.blue;
// console.log(color); // ==> 2


enum Color { red, green = 'green', blue = 'blue' }

let color: Color = Color.green;
console.log(color); // ==> green

color = Color.blue;
console.log(color); // ==> blue

function printColor(c: Color) {
    switch (c) {
        case 'green':
            console.log('This is a Green color'); break;

    }
}

printColor(Color.green);


// Interface
let person = {
    firstName: 'Mina',
    lastName: 'D',
    sayHi: () => 'Hi'
};

// let person: II = 

interface IPerson {
    firstName: string,
    lastName: string,
    sayHi: () => string
}

let person2: IPerson = {
    firstName: 'M',
    lastName: 'D',
    sayHi: () => 'Hola'
}