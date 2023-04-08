import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './app.component';
import { StudentComponent } from './Student/student.component';
import { FormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { RatingModule } from 'primeng/rating';
import { PasswordModule } from 'primeng/password';

import { StudentListComponent } from './Student/student-list/student-list.component';
import { StudentDetailsComponent } from './Student/student-details/student-details.component';
import { AddStudentComponent } from './Student/add-student/add-student.component';
import { EditStudentComponent } from './Student/edit-student/edit-student.component';
import { DepartmentListComponent } from './department/department-list/department-list.component';
import { DepartmentDetailsComponent } from './department/department-details/department-details.component';
import { AddDepartmentComponent } from './department/add-department/add-department.component';
import { EditDepartmentComponent } from './department/edit-department/edit-department.component';
import { InstructorModule } from './instructor/instructor.module';
import { CoreModule } from './core/core.module';
import { HomeComponent } from './home/home.component';
import { ContactusComponent } from './contactus/contactus.component';
import { AboutusComponent } from './aboutus/aboutus.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { AppRoutingModule } from './app-routing.module';
import { LoginComponent } from './login/login.component';

@NgModule({
  declarations: [
    AppComponent,
    StudentComponent,
    StudentListComponent,
    StudentDetailsComponent,
    AddStudentComponent,
    EditStudentComponent,
    DepartmentListComponent,
    DepartmentDetailsComponent,
    AddDepartmentComponent,
    EditDepartmentComponent,
    HomeComponent,
    ContactusComponent,
    AboutusComponent,
    NotfoundComponent,
    LoginComponent,
  ],
  imports: [
    PasswordModule,
    RatingModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    BrowserModule,
    FormsModule,
    CoreModule,
    InstructorModule,
  ],
  exports: [AppRoutingModule],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}
