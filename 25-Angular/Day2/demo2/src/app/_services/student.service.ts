import { Injectable } from '@angular/core';
import { Student } from '../_models/student';
//dependency
@Injectable({
  providedIn: 'root'
})
export class StudentService {
  private students:Student[]=[
    new Student(10,"aly",30),
    new Student(30,"ayman",30),
    new Student(30,"mahmoud",30),

  ];
  getAll(){
    return this.students;
  }
  add(std:Student){
    this.students.push(new Student(std.id,std.name,std.age));
    console.log("save inside service");

  }
  getStudentById(id:number):Student|null
  {
    for (let i = 0; i < this.students.length; i++) {
      if(this.students[i].id==id)
      return this.students[i];  
    }
    return null;
  }

  constructor() { }
}
