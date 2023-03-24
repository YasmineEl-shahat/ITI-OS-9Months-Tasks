import { Component, EventEmitter, Output, Input } from '@angular/core';
import { Student } from '../../_models/student';

@Component({
  selector: 'app-edit-student',
  templateUrl: './edit-student.component.html',
  styleUrls: ['./edit-student.component.css'],
})
export class EditStudentComponent {
  @Input() std: Student = new Student(0, '', 0);
  @Output() onStudentSave: EventEmitter<Student> = new EventEmitter<Student>();
  save(name: string, age: string) {
    this.std.name = name;
    this.std.age = Number(age);
    this.onStudentSave.emit(this.std);
  }
}
