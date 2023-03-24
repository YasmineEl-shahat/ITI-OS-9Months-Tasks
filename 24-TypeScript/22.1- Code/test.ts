import { Child2 } from './classes/child2.model';
import { Child1 } from './classes/child1.model';
import { Parent } from "./classes/parent.model";

let p: Parent = new Parent();
console.log(p.getType());

let c1: Child1 = new Child1();
console.log(c1.getType());

let c2: Child2 = new Child2();
console.log(c2.getType());
