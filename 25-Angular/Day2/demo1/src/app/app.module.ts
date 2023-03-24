import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { StudentComponent } from './Student/student.component';
import { DepartmentComponent } from './department/department.component';
import { FormsModule } from '@angular/forms';
import { PowerPipe } from './power.pipe';
import { StudentListComponent } from './student-list/student-list.component';
import { ArraypPipe } from './arrayp.pipe';
import { StudentDetailsComponent } from './student-details/student-details.component';
import { AddStudentComponent } from './add-student/add-student.component';

@NgModule({
  declarations: [
    AppComponent,StudentComponent, DepartmentComponent, PowerPipe, StudentListComponent, ArraypPipe, StudentDetailsComponent, AddStudentComponent
  ],
  imports: [
    BrowserModule,FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
