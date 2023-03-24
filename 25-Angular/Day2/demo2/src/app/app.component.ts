import { Component } from '@angular/core';
import { StudentService } from './_services/student.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
 // providers:[StudentService]
})
export class AppComponent {
  title = 'demo2';
}
