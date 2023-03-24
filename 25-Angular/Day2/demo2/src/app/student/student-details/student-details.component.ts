import { Component, Input,OnInit,OnChanges } from '@angular/core';
import { Student } from 'src/app/_models/student';
import { StudentService } from 'src/app/_services/student.service';

@Component({
  selector: 'app-student-details',
  templateUrl: './student-details.component.html',
  styleUrls: ['./student-details.component.css'],
})
export class StudentDetailsComponent implements OnInit,OnChanges {
  stdDetails:Student|null=null;
  @Input() id=0;
  constructor(public studentService:StudentService){}
  ngOnChanges(){
   this.stdDetails= this.studentService.getStudentById(this.id);

  }
  ngOnInit(){
   //this.stdDetails= this.studentService.getStudentById(this.id);
  }

}
