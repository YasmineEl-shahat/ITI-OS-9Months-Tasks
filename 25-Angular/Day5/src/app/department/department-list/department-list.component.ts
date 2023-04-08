import { Component, OnInit } from '@angular/core';
import { Department } from 'src/app/_models/department';
import { DepartmentService } from 'src/app/_services/department.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-department-list',
  templateUrl: './department-list.component.html',
  styleUrls: ['./department-list.component.css'],
})
export class DepartmentListComponent implements OnInit {
  departments: Department[] = [];
  // id = 0;
  editdept = new Department(0, '');
  // detailsflag = false;
  editflag = false;
  constructor(
    public departmentService: DepartmentService,
    private router: Router
  ) {}
  ngOnInit(): void {
    this.departments = this.departmentService.getAll();
  }
  edit(id: number) {
    for (let i = 0; i < this.departments.length; i++) {
      if (this.departments[i].id == id) {
        this.editdept = this.departments[i];
        this.editflag = true;
        break;
      }
    }
  }
  // show(id: number) {
  //   this.id = id;
  //   this.detailsflag = true;
  // }

  delete(id: number) {
    this.departmentService.delete(id);
    this.departments = this.departmentService.getAll();
  }
  saveEdit(dept: Department) {
    this.departmentService.edit(dept.id, dept.name);
    this.editflag = false;
  }

  departmentDetails(id: number) {
    this.router.navigate(['/departments/details', id]);
  }
}
