import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { ContactusComponent } from './contactus/contactus.component';
import { AboutusComponent } from './aboutus/aboutus.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { StudentListComponent } from './Student/student-list/student-list.component';
import { InstructorListComponent } from './instructor/instructor-list/instructor-list.component';

const routes: Routes = [
  { path: 'home', component: HomeComponent },
  { path: 'contact', component: ContactusComponent },
  { path: 'about', component: AboutusComponent },
  { path: 'students', component: StudentListComponent },
  {
    path: 'departments',
    loadChildren: () =>
      import('./department/department-routing.module').then(
        (m) => m.DepartmentRoutingModule
      ),
    // canLoad: [AuthGuard],
  },
  { path: 'instructors', component: InstructorListComponent },
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: '**', component: NotfoundComponent },
];

@NgModule({
  declarations: [],
  imports: [CommonModule, RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
