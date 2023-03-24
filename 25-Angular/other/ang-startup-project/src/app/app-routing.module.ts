import { LayoutComponent } from './components/layout/layout.component';
import { NotFoundComponent } from './components/not-found/not-found.component';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '', 
    component:LayoutComponent,
    loadChildren: () => import('./components/profile/profile.module').then(m => m.ProfileModule)
  },

  {
    path: 'tasks', 
    component:LayoutComponent,
    loadChildren: () => import('./components/task/task.module').then(m => m.TaskModule)
  },
{
  path: 'user', 
 
  loadChildren: () => import('./components/user/user.module').then(m => m.UserModule)
},
{
  path: 'student', 
  component:LayoutComponent,
  loadChildren: () => import('./components/student/student.module').then(m => m.StudentModule)
},

{path:'**',component:NotFoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
