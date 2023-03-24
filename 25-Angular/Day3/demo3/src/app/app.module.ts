import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {FormsModule} from '@angular/forms';

import { AppComponent } from './app.component';

import { DepartmentModule } from './department/department.module';
import { CourseModule } from './course/course.module';
import { StudentModule } from './student/student.module';
import { CoreModule } from './core/core.module';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {RatingModule} from 'primeng/rating';
import {PasswordModule} from 'primeng/password';
import {ChipsModule} from 'primeng/chips';
import {RouterModule,Routes} from '@angular/router';
import { HomeComponent } from './home/home.component';
import { ContactusComponent } from './contactus/contactus.component';
import { AboutusComponent } from './aboutus/aboutus.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { AppRoutingModule } from './app-routing.module';



@NgModule({
  declarations: [
    AppComponent,],
  imports: [
    AppRoutingModule,
    
    RatingModule,PasswordModule,ChipsModule,
    
    BrowserAnimationsModule,
    BrowserModule,DepartmentModule,CourseModule,FormsModule,StudentModule,CoreModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
