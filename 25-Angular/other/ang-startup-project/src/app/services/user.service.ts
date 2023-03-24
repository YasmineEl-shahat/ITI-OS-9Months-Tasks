import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  logged=new BehaviorSubject<boolean>(this.isLoggedIn());
  constructor() { }
  
  login(token:string)
  {
    localStorage.setItem("Token",token);
    this.logged.next(true);
  }

  isLoggedIn():boolean
  {
   let toekn= localStorage.getItem("Token");
   return toekn!=null;
  }

  logout(){
    localStorage.removeItem("Token");
    this.logged.next(false);
  }
}
