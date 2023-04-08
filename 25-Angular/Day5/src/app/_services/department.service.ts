import { Injectable } from '@angular/core';
import { Department } from '../_models/department';
//dependency
@Injectable({
  providedIn: 'root',
})
export class DepartmentService {
  private departments: Department[] = [
    new Department(1, 'os'),
    new Department(2, 'pd'),
    new Department(3, 'ai'),
  ];
  getAll() {
    return this.departments;
  }
  getDepartmentById(id: number): Department | null {
    for (let i = 0; i < this.departments.length; i++) {
      if (this.departments[i].id == id) return this.departments[i];
    }
    return null;
  }
  add(dept: Department) {
    this.departments.push(new Department(dept.id, dept.name));
  }
  edit(id: number, name: string) {
    for (let i = 0; i < this.departments.length; i++) {
      if (this.departments[i].id == id) {
        this.departments[i].name = name;
        break;
      }
    }
  }
  delete(id: number) {
    this.departments = this.departments.filter(
      (department) => department.id != id
    );
  }
  constructor() {}
}
