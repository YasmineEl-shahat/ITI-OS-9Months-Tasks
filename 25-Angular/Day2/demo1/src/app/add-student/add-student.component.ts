import { Component, EventEmitter, Output } from '@angular/core';
import { Student } from '../_models/student';

@Component({
  selector: 'app-add-student',
  templateUrl: './add-student.component.html',
  styleUrls: ['./add-student.component.css']
})
export class AddStudentComponent {
  std:Student=new Student(0,"",0);
 @Output() onStudentSave:EventEmitter<Student>=new EventEmitter<Student>();
  save(){
    this.onStudentSave.emit(this.std);
  }

}
