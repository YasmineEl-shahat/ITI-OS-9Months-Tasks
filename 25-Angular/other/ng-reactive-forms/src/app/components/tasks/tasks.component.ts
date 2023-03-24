import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Task } from 'src/app/models/task';

@Component({
  selector: 'app-tasks',
  templateUrl: './tasks.component.html',
  styleUrls: ['./tasks.component.css']
})
export class TasksComponent implements OnInit {

  tasks:Task[]=[];
  name:string="Mohamed Ali";
  id:number=100000;
  constructor(private _httpClient:HttpClient) {
   }

  ngOnInit(): void {
    this._httpClient.get(`https://api.mohamed-sadek.com/task/get`)
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
    this._httpClient.post(`https://api.mohamed-sadek.com/task/post`,task)
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
    this._httpClient.put(`https://api.mohamed-sadek.com/task/put`,task)
    .subscribe(
      (response:any)=>{},
      (error:any)=>{}
    );
    //alert("Done");
  }

  delete(index:number):void
  {
    let task=this.tasks[index];
    this._httpClient.delete(`https://api.mohamed-sadek.com/Task/Delete?id=${task.ID}`)
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
