import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-employee', //<app-employee></app-employee>
  templateUrl: './employee.component.html',
  styleUrls: ['./employee.component.css']
})
export class EmployeeComponent implements OnInit {

  firstName:string="Mohamed";
  lastName:string="Ali";
  constructor() { }

  ngOnInit(): void {
  }

  setFirstName(newFirstName:string):void{
    this.firstName=newFirstName;
  }

  setLastName():void{
    this.lastName="Mostafa";
    
  }

  getFullName():string{
    return this.firstName+' '+this.lastName;
  }

}
