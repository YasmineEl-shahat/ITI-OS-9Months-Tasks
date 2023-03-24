// Data Types:
//#region Built-in Types
// Number
var age = 25;
age = 25.5;
// String
var firstName = 'John';
firstName = '40';
var fullName = 'John Smith';
fullName = "John Smith";
fullName = firstName + " Smith";
// Boolean
var isMarried = true;
// Function
var fn = function () { return console.log('Hi'); };
// Object
var obj = {
    name: 'Samy'
};
//#endregion
//#region  User defined Types
// Classes, Enums, Interfaces
var Student = /** @class */ (function () {
    function Student() {
    }
    return Student;
}());
var std1 = null;
var bird;
var Color;
(function (Color) {
})(Color || (Color = {}));
var carColor;
//#endregion
//#region  Any Type
var changing = 'John';
changing = 50;
changing = true;
changing = [];
//#endregion
var change;
change = 2;
change = false;
// change = ''; // Error
// Return Types
var greeting = function (name) { return console.log("Hello " + name); };
var greeting2 = function (name) {
    return "Hello " + name;
};
var greeting3 = function (name) { return "Hello " + name; };
function sayHi(name) {
    alert('Hi' + name);
}
var value = greeting('Hana');
console.log(value); // undefined
var value2 = greeting2('John');
console.log(value2);
// Generics
function identity(arg) {
    return arg;
}
var output = identity(33);
function identity2(arg) {
    return arg;
}
var output2 = identity2('string');
function identity3(arg) {
    return arg;
}
var output3 = identity3([]);
function genericIdentity(arg) {
    return arg;
}
var o4 = genericIdentity(true);
var o5 = genericIdentity('myString');
// Enum
// enum Color { red, green, blue }
// let color: Color = Color.green;
// console.log(color); // ==> 1
// color = Color.blue;
// console.log(color); // ==> 2
(function (Color) {
    Color[Color["red"] = 0] = "red";
    Color["green"] = "green";
    Color["blue"] = "blue";
})(Color || (Color = {}));
var color = Color.green;
console.log(color); // ==> green
color = Color.blue;
console.log(color); // ==> blue
function printColor(c) {
    switch (c) {
        case 'green':
            console.log('This is a Green color');
            break;
    }
}
printColor(Color.green);
// Interface
var person = {
    firstName: 'Mina',
    lastName: 'D',
    sayHi: function () { return 'Hi'; }
};
var person2 = {
    firstName: 'M',
    lastName: 'D',
    sayHi: function () { return 'Hola'; }
};
person2['middleName'] = 'S';
console.log(person2['middleName']);
