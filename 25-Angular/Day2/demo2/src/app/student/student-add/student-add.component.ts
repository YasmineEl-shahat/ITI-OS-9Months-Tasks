import { Component } from '@angular/core';
import { Student } from 'src/app/_models/student';
import { StudentService } from 'src/app/_services/student.service';

@Component({
  selector: 'app-student-add',
  templateUrl: './student-add.component.html',
  styleUrls: ['./student-add.component.css'],
  //providers:[StudentService]
})
export class StudentAddComponent {

  std:Student=new Student(0,"",20);
  constructor(public studentService:StudentService){}
  save(){
      this.studentService.add(this.std);
      console.log("save inside component");
  }
}
