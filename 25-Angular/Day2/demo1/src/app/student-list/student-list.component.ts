import { Component } from '@angular/core';
import { Student } from '../_models/student';

@Component({
  selector: 'app-student-list',
  templateUrl: './student-list.component.html',
  styleUrls: ['./student-list.component.css']
})
export class StudentListComponent {
  degree=30;
  xyz="a"
  std:Student=new Student(0,"",30);
  stddetails=new Student(0,"",30);
  detailsflag=false;
  Add(std:Student){
    this.students.push(new Student(std.id,std.name,std.age));
  }
  show(id:number){
    for (let i = 0; i < this.students.length; i++) {
      if(this.students[i].id==id){
        this.stddetails=this.students[i];
        this.detailsflag=true;
        break;
      }
      
    }
  }
  students:Student[]=[
    new Student(10,"ahmed",20),
    new Student(20,"mohamed",20),
    new Student(30,"aly",30),
    new Student(40,"sara",50),
    new Student(80,"sara",50),

  ];

}
