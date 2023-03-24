import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-rating',
  templateUrl: './rating.component.html',
  styleUrls: ['./rating.component.css']
})
export class RatingComponent implements OnInit {

  stars= [1,2,3,4,5];
  @Input() rate=5;
  @Output() change=new EventEmitter<number>();
  //@Input() type=1;
  constructor() { }

  ngOnInit(): void {
  }

  onRatingChanged(newRate:number):void
  {
    this.rate=newRate;
    this.change.emit(newRate);
    //alert(newRate);
    //if(this.type==1)
    //Call Task API
    //if(this.type==2)
    //Call Student API
    //Call API Course
  }

}
