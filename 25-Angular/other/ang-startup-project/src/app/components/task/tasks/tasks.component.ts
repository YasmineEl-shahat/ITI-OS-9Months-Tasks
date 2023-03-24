import { TaskService } from '../../../services/task.service';
import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Task } from 'src/app/models/task';
import { UserService } from 'src/app/services/user.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-tasks',
  templateUrl: './tasks.component.html',
  styleUrls: ['./tasks.component.css']
})
export class TasksComponent implements OnInit {

  tasks:Task[]=[];
  name:string="Mohamed Ali";
  id:number=100000;
  constructor(private _taskService:TaskService,private _userService:UserService,private _router:Router) {
   }

  ngOnInit(): void {
    //alert()
    if(!this._userService.isLoggedIn())
    {
      this._router.navigateByUrl('/user/login');
    }
    this._taskService.get()
    .subscribe(
      (response:any)=>{
        console.log(JSON.stringify(response));
        this.tasks=response.Data;
        //alert("alert 1");
      }
      ,
      (error:any)=>{
        alert("error");
      }
    );
    //alert("alert 2");

  }

  add(title:string):void{
    let task=new Task();
    task.Title=title;
    this._taskService.post(task)
    .subscribe(
      (response:any)=>{
        this.tasks.push(task);
      },
      (error:any)=>{}
    );
    
  }

  update(task:Task):void
  {
    task.IsDone=!task.IsDone;
    this._taskService.put(task)
    .subscribe(
      (response:any)=>{},
      (error:any)=>{}
    );
    //alert("Done");
  }

  delete(index:number):void
  {
    let task=this.tasks[index];
    this._taskService.delete(task.ID)
    .subscribe(
      (response:any)=>{
        this.tasks.splice(index,1);
      },
      (error:any)=>{}
    );
    

  }

  getPendingTasksCount():number{
      return this.tasks.filter(task=>!task.IsDone).length;
  }

}
