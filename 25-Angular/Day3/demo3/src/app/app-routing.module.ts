import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {Routes,RouterModule} from '@angular/router';
import { HomeComponent } from './home/home.component';
import { AboutusComponent } from './aboutus/aboutus.component';
import { ContactusComponent } from './contactus/contactus.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { StudentDetailsComponent } from './student/student-details/student-details.component';
import { StudentListComponent } from './student/student-list/student-list.component';

const routes:Routes=[
  {path:"home",component:HomeComponent},
  {path:"contact",component:ContactusComponent},
  {path:"about",component:AboutusComponent},
  {path:"students",component:StudentListComponent},
  {path:"students/details/:id",component:StudentDetailsComponent},


  {path:"",redirectTo:"home",pathMatch:"full"},

  {path:"**",component:NotfoundComponent},

]

@NgModule({
  declarations: [],
  imports: [
    CommonModule,RouterModule.forRoot(routes)
  ],
  exports:[RouterModule]
})
export class AppRoutingModule { }
