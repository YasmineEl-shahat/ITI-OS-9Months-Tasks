import { Component } from '@angular/core';
import { StudentService } from './_services/student.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
 // providers:[StudentService]
})
export class AppComponent {
  val:number=3;
  title = 'demo2';
  values:string[]=[];
}
