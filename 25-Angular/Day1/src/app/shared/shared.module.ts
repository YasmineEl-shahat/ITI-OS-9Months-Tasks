import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RateComponent } from './rate/rate.component';

@NgModule({
  declarations: [RateComponent],
  imports: [CommonModule],
  exports: [RateComponent],
})
export class SharedModule {}
