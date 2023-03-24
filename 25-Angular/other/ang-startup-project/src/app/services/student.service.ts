import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Student } from '../models/student';

@Injectable({
  providedIn: 'root'
})
export class StudentService {

  constructor(private _httpClient:HttpClient) { }
  get(){
   return this._httpClient.get('https://api.mohamed-sadek.com/student/get');
  }

  post(student:Student){
    return this._httpClient.post('https://api.mohamed-sadek.com/student/post',student);
   }

   
  put(student:Student){
    return this._httpClient.put('https://api.mohamed-sadek.com/student/put',student);
   }

   delete(id:number){
    return this._httpClient.delete(`https://api.mohamed-sadek.com/student/delete?id=${id}`);
   }
}
