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
