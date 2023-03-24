import { Component } from "@angular/core";
import { Student } from "../_models/student";

@Component({
    selector:'app-student',
    templateUrl:"./student.component.html"
  
})
export class StudentComponent{
   std:Student=new Student(10,"aly",30);
   
}