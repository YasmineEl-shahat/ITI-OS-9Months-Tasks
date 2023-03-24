export class Mobile2Service{
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