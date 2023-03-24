import { Directive, ElementRef, EventEmitter, HostListener } from '@angular/core';


@Directive({
  selector: '[onlyarabic]'
})
export class ArbicDeirectiveDirective {

  changed=new EventEmitter<Date>();
  constructor(private el:ElementRef) { }

  @HostListener('keydown') onKeyDown(){
    let value=this.el.nativeElement.value as string;
    let lastChar=value.substring(value.length,1);
    this.el.nativeElement.value=value;
    alert(value);
    
  }

}
