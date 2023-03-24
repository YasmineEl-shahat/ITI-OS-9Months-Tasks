import { HttpClientModule } from '@angular/common/http';

import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { Routes, RouterModule } from '@angular/router';
import { LogoutComponent } from './logout/logout.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { LoginComponent } from './login/login.component';

const routes: Routes = [
  {path:'login',component:LoginComponent},
  {path:'logout',component:LogoutComponent},

];

@NgModule({
  declarations: [  LoginComponent,
    LogoutComponent],
  imports: [
    CommonModule,RouterModule.forChild(routes),ReactiveFormsModule,FormsModule,HttpClientModule
  ]
})
export class UserModule { }
