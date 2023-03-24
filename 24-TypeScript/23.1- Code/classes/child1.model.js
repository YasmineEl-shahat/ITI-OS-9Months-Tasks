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
exports.Child1 = void 0;
var parent_model_1 = require("./parent.model");
var Child1 = /** @class */ (function (_super) {
    __extends(Child1, _super);
    function Child1() {
        return _super.call(this) || this;
    }
    Child1.prototype.getType = function () {
        return 'type is child 1';
    };
    return Child1;
}(parent_model_1.Parent));
exports.Child1 = Child1;
