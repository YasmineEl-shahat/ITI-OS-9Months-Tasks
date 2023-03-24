import { Parent } from './parent.model';
export class Child1 extends Parent {
    child1Prop1: string;
    constructor() {
        super();
    }
    getType() {
        return 'type is child 1';
    }
}