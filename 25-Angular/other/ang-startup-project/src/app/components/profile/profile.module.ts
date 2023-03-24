import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AboutComponent } from './about/about.component';

import { Routes, RouterModule } from '@angular/router';
import { SharedModule } from '../shared/shared.module';
import { HomeComponent } from './home/home.component';
import { ContactComponent } from './contact/contact.component';


const routes: Routes = [
{path:'home',component:HomeComponent},
{path:'about',component:AboutComponent},
{path:'contact',component:ContactComponent},
{path:'',component:HomeComponent}
];
@NgModule({
  declarations: [ AboutComponent,
    HomeComponent,
    ContactComponent,],
  imports: [
    CommonModule,RouterModule.forChild(routes),SharedModule
  ]
})
export class ProfileModule { }
