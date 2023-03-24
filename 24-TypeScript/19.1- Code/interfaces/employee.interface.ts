import { IPerson } from './person.interface';
import { IParent } from './parent.interface';

// Child Interface inherits/extends Super Interface
export interface IEmployee extends IPerson, IParent {
    salary: number;
}