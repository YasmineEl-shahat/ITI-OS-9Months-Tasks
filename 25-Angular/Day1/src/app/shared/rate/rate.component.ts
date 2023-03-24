import { Component, Input, OnChanges } from '@angular/core';

@Component({
  selector: 'app-rate',
  templateUrl: './rate.component.html',
  styleUrls: ['./rate.component.css'],
})
export class RateComponent implements OnChanges {
  @Input() rating: number = 2;
  divWidth = 30;
  ngOnChanges() {
    this.divWidth = this.rating * 15;
  }
}
