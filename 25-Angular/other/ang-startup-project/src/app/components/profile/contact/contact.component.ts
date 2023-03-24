import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.css']
})
export class ContactComponent implements OnInit {

  contactUsRate=4;
  constructor() { }

  ngOnInit(): void {
  }


  onContactUsRatingChanged(rate:number):void
  {
    this.contactUsRate=rate;
//Call API

  }

}
