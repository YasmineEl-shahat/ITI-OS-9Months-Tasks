import { ThisReceiver } from '@angular/compiler';
import { Component ,OnInit} from '@angular/core';
import { Student } from 'src/app/_models/student';
import { StudentService } from 'src/app/_services/student.service';
//dependent
@Component({
  selector: 'app-student-list',
  templateUrl: './student-list.component.html',
  styleUrls: ['./student-list.component.css'],
  //providers:[StudentService]
})
export class StudentListComponent implements OnInit  {
  students:Student[]=[];
  ids=30;
  constructor(public studentService:StudentService){
   // this.students=this.studentService.getAll();
  }
  ngOnInit(): void {
    this.students=this.studentService.getAll();
  }
 

}
