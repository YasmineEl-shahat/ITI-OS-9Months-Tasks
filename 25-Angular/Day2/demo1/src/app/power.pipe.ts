import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'power',
  pure:false
})
export class PowerPipe implements PipeTransform {

  transform(value: number, x:number=1): unknown {
    return Math.pow(value,x);
  }

}
