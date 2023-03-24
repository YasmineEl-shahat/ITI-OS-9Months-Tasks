import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TasksComponent } from './tasks/tasks.component';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from 'src/app/guards/auth.guard';
import { SharedModule } from '../shared/shared.module';
import { DetailsComponent } from './details/details.component';

const routes: Routes = [
  {path:'details/:id',component:DetailsComponent},
{path:'',component:TasksComponent,canActivate:[AuthGuard]}
];

@NgModule({
  declarations: [  TasksComponent,
    DetailsComponent,],
  imports: [
    CommonModule,RouterModule.forChild(routes),SharedModule
  ]
})
export class TaskModule { }
