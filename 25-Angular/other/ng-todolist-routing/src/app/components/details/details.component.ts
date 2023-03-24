import { HttpClient } from '@angular/common/http';
import { Task } from 'src/app/models/task';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.css']
})
export class DetailsComponent implements OnInit {

  task:Task=new Task();
  constructor(private _activatedRoute:ActivatedRoute , private _httpClient:HttpClient) {
    alert("constructor");
   }

  ngOnInit(): void {
    alert("ngOnInit");

    this._activatedRoute.paramMap.subscribe(params=>{

      alert("_activatedRoute");
      
      let id=params.get('id');
this._httpClient.get(`https://api.mohamed-sadek.com/Task/GetByID?id=${id}`)
.subscribe(
  (response:any)=>{
    this.task=response.Data;
  },
  (error:any)=>{}
)
      //alert(id);
    })
  }

}
