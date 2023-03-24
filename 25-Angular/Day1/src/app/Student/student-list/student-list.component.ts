import { Component } from '@angular/core';
import { Student } from '../../_models/student';

@Component({
  selector: 'app-student-list',
  templateUrl: './student-list.component.html',
  styleUrls: ['./student-list.component.css'],
})
export class StudentListComponent {
  std: Student = new Student(0, '', 30);
  stddetails: Student = new Student(0, '', 30);
  detailsflag: boolean = false;
  editflag: boolean = false;
  students: Student[] = [
    new Student(1, 'mohamed', 50),
    new Student(2, 'hana', 20),
    new Student(3, 'ola', 25),
  ];
  add(std: Student) {
    this.students.push(new Student(std.id, std.name, std.age));
  }
  show(id: number) {
    for (let i = 0; i < this.students.length; i++) {
      if (this.students[i].id == id) {
        this.stddetails = this.students[i];
        this.detailsflag = true;
        break;
      }
    }
  }
  edit(id: number) {
    for (let i = 0; i < this.students.length; i++) {
      if (this.students[i].id == id) {
        this.stddetails = this.students[i];
        this.editflag = true;
        break;
      }
    }
  }
  saveEdit(std: Student) {
    for (let i = 0; i < this.students.length; i++) {
      if (this.students[i].id == std.id) {
        this.students[i].name = std.name;
        this.students[i].age = std.age;
        this.editflag = false;
        break;
      }
    }
  }
  delete(id: number) {
    this.students = this.students.filter((student) => student.id != id);
  }
}
