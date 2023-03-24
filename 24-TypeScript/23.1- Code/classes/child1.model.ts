import { IBase } from './../interfaces/base.interface';
import { Parent } from './parent.model';
export class Child1 extends Parent implements IBase {
    child1Prop1: string;
    constructor() {
        super();
    }
    getType(): string {
        return 'type is child 1'
    }
}