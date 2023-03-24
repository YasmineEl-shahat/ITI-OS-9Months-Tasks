import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class MobileService {

  constructor(){
    alert("MobileService");
}
isValidMobile(mobile:string):boolean
{
  if(mobile && mobile.length==11 )
    return true;
  return false
}
}
