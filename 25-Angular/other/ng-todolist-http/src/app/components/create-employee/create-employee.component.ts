import { Component, OnInit } from '@angular/core';
import { Employee } from 'src/app/models/employee';
import { MobileService } from 'src/app/services/mobile.service';

@Component({
  selector: 'app-create-employee',
  templateUrl: './create-employee.component.html',
  styleUrls: ['./create-employee.component.css']
})
export class CreateEmployeeComponent implements OnInit {

  employees:Employee[]=[];

  constructor(private _mobileService:MobileService) { 
  }

  ngOnInit(): void {
  }

  add(name:string,mobile:string):void
  {
    
   if(!this._mobileService.isValidMobile(mobile))
        alert('invalid email number');

    let employee=new Employee();
    this.employees.push(employee);

    //Send Email to employee
  this.sendEmail('m@sda.com');
  }

  // isValidMobile(mobile:string):boolean
  // {
  //   if(mobile && mobile.length==11 )
  //     return true;
  //   return false
  // }

  sendEmail(email:string):void
  {
    //Send Email
  }

}
