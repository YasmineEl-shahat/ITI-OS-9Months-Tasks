import { Component, OnInit } from '@angular/core';
import { Employee } from '../models/employee';


@Component({
  selector: 'app-employee', //<app-employee></app-employee>
  templateUrl: './employee.component.html',
  styleUrls: ['./employee.component.css']
})
export class EmployeeComponent implements OnInit {

  employee:Employee=new Employee();
  employees:Employee[]=[];
  //conunter:number=0;
  courses:string[]=['Angular','C#','Node','PHP'];
  constructor() { }

  ngOnInit(): void {
  }

  setFirstName(newFirstName:string):void{
    this.employee.firstName=newFirstName;
  }

  setLastName(newLastName:string):void{
    this.employee.lastName=newLastName;

  }

  getFullName():string{
    return this.employee.firstName+' '+this.employee.lastName;
  }

  add(firstName:string,lastName:string,age:number):void{
    let employee=new Employee();
    employee.firstName=firstName;
    employee.lastName=lastName;
    employee.age=age;
    this.employees.push(employee);
    //this.conunter=this.employees.length;
  }

  delete(index:number):void
  {
    this.employees.splice(index,1);
    //this.conunter=this.employees.length;
  }

  getStudentsCount():number{
    return this.employees.length;
  }

}
