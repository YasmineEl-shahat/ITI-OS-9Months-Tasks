import { Component, Input, Output, EventEmitter } from '@angular/core';
import { Department } from 'src/app/_models/department';

@Component({
  selector: 'app-edit-department',
  templateUrl: './edit-department.component.html',
  styleUrls: ['./edit-department.component.css'],
})
export class EditDepartmentComponent {
  @Input() dept: Department = new Department(0, '');

  @Output() onDeptSave: EventEmitter<Department> =
    new EventEmitter<Department>();
  save(name: string) {
    this.dept.name = name;
    this.onDeptSave.emit(this.dept);
  }
}
