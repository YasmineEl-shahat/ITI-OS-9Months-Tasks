import { Child2 } from './classes/child2.model';
import { Child1 } from './classes/child1.model';
import { Parent } from "./classes/parent.model";

let p: Parent = new Child1();
p.parentProp1;

let c1: Child1 = new Child2();
c1.child1Prop1;
c1.parentProp1;

let c2: Child2 = new Child2();
c2.child2Prop1;
c2.child1Prop1;
c2.parentProp1;
