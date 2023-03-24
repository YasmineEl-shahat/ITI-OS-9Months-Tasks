import { Student } from './../../models/student';
import { Component, OnInit } from '@angular/core';
import { MobileService } from 'src/app/services/mobile.service';

@Component({
  selector: 'app-create-student',
  templateUrl: './create-student.component.html',
  styleUrls: ['./create-student.component.css']
})
export class CreateStudentComponent implements OnInit {

  students:Student[]=[];
  constructor(private _mobileService:MobileService) { 
  }

  ngOnInit(): void {
  }
  add(name:string,mobile:string):void
  {
    
   if(!this._mobileService.isValidMobile(mobile))
        alert('invalid email number');

    let student=new Student();
    this.students.push(student);

    //Send Email to employee
  this.sendEmail('m@sda.com');
  }



  sendEmail(email:string):void
  {
    //Send Email
  }

}
