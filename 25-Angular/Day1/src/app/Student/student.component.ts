import { Component } from '@angular/core';
import { Student } from '../_models/student';
@Component({
  selector: 'app-student',
  templateUrl: './student.component.html',
})
// export class StudentComponent {
//   name = 'aly';
//   age = 30;
//   stdimg = 'assets/a1.jpg';
//   flag = true;
//   num = 2;
//   bdate = new Date(1990, 1, 25);
//   details(s: string) {
//     alert(s);
//   }
//   display(n: any) {
//     console.log(n.value);
//   }
//   show() {
//     this.num++;
//     console.log('yasmine' + this.num);
//   }
//   myfun(): string {
//     return 'aly';
//   }
// }
export class StudentComponent {
  std: Student = new Student(10, 'aly', 30);
}
