import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-instructor-list',
  templateUrl: './instructor-list.component.html',
  styleUrls: ['./instructor-list.component.css'],
})
export class InstructorListComponent implements OnInit {
  id: number = 0;

  constructor() {}

  ngOnInit(): void {}

  show(d: any) {
    console.log(d.value);
  }
}
