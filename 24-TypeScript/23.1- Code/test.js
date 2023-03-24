"use strict";
exports.__esModule = true;
var child2_model_1 = require("./classes/child2.model");
var child1_model_1 = require("./classes/child1.model");
var parent_model_1 = require("./classes/parent.model");
var p = new parent_model_1.Parent();
var c1 = new child1_model_1.Child1();
var c2 = new child2_model_1.Child2();
function printType(arg) {
    console.log(arg.getType());
}
// printType(p); // Error
printType(c1);
printType(c2);
