import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DepartmentListComponent } from './department-list/department-list.component';
import { DepartmentDetailsComponent } from './department-details/department-details.component';
import { AddDepartmentComponent } from './add-department/add-department.component';
const routes: Routes = [
  // { path: '', component: DepartmentListComponent },
  // { path: 'details/:id', component: DepartmentDetailsComponent },
  // { path: 'add', component: AddDepartmentComponent },
  {
    path: '',
    component: DepartmentListComponent,
    children: [
      { path: 'details/:id', component: DepartmentDetailsComponent },
      { path: 'add', component: AddDepartmentComponent },
    ],
  },
];
@NgModule({
  declarations: [],
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class DepartmentRoutingModule {}
