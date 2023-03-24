import { Component } from '@angular/core';
import { Department } from 'src/app/_models/department';
import { DepartmentService } from 'src/app/_services/department.service';

@Component({
  selector: 'app-add-department',
  templateUrl: './add-department.component.html',
  styleUrls: ['./add-department.component.css'],
})
export class AddDepartmentComponent {
  dept: Department = new Department(0, '');
  constructor(public departmentService: DepartmentService) {}
  save() {
    this.departmentService.add(this.dept);
  }
}
