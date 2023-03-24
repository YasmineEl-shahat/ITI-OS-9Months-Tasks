import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
 
  constructor(private _httpClient:HttpClient) { }
  get(url:string){
    return this._httpClient.get(`${environment.api_URL}/${url}`);
   }
 
   post(url:string,body:any){
     return this._httpClient.post(`${environment.api_URL}/${url}`,body);
    }
 
    
   put(url:string,body:any){
     return this._httpClient.put(`${environment.api_URL}/${url}`,body);
    }
 
    delete(url:string){
     return this._httpClient.delete(`${environment.api_URL}/${url}`);
    }
}