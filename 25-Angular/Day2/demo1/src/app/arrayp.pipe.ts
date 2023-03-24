import { Pipe, PipeTransform } from '@angular/core';
import { Student } from './_models/student';

@Pipe({
  name: 'arrayp',
  pure:false
})
export class ArraypPipe implements PipeTransform {

  transform(value: Student[],ch:string="a"): Student[] {
    let res:Student[]=[];
    for(let i=0;i<value.length;i++){
      if(value[i].name.startsWith(ch))
        res.push(value[i]);
    }
    return res;
  }

}
