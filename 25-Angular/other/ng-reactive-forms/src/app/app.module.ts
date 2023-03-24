import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { TasksComponent } from './components/tasks/tasks.component';
import { CreateEmployeeComponent } from './components/create-employee/create-employee.component';
import { CreateStudentComponent } from './components/create-student/create-student.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AboutComponent } from './components/about/about.component';
import { HomeComponent } from './components/home/home.component';
import { ContactComponent } from './components/contact/contact.component';
import { DetailsComponent } from './components/details/details.component';
import { NotFoundComponent } from './components/not-found/not-found.component';
import { LoginComponent } from './components/login/login.component';
import { ArabicDatePipe } from './pipes/arabic-date.pipe';
import { MaxLengthPipe } from './pipes/max-length.pipe';
import { HeaderComponent } from './components/header/header.component';
import { RatingComponent } from './components/rating/rating.component';

@NgModule({
  declarations: [
    AppComponent,
    TasksComponent,
    CreateEmployeeComponent,
    CreateStudentComponent,
    AboutComponent,
    HomeComponent,
    ContactComponent,
    DetailsComponent,
    NotFoundComponent,
    LoginComponent,
    ArabicDatePipe,
    MaxLengthPipe,
    HeaderComponent,
    RatingComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,FormsModule , HttpClientModule , ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
