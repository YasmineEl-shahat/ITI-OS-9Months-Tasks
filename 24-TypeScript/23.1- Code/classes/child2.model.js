"use strict";
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
exports.__esModule = true;
exports.Child2 = void 0;
var child1_model_1 = require("./child1.model");
var Child2 = /** @class */ (function (_super) {
    __extends(Child2, _super);
    function Child2() {
        return _super.call(this) || this;
    }
    return Child2;
}(child1_model_1.Child1));
exports.Child2 = Child2;
