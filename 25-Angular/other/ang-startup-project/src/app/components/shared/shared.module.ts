import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { RatingComponent } from '../rating/rating.component';
import { ArabicDatePipe } from 'src/app/pipes/arabic-date.pipe';
import { MaxLengthPipe } from 'src/app/pipes/max-length.pipe';
import { ArbicDeirectiveDirective } from 'src/app/directives/arbic-deirective.directive';



@NgModule({
  declarations: [RatingComponent,ArabicDatePipe,
    MaxLengthPipe,ArbicDeirectiveDirective],
  imports: [
    CommonModule,ReactiveFormsModule,FormsModule,HttpClientModule
  ],
  exports:[ReactiveFormsModule,FormsModule,HttpClientModule,RatingComponent,ArabicDatePipe,
    MaxLengthPipe,ArbicDeirectiveDirective]
})
export class SharedModule { }
