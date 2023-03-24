import {
  Component,
  Input,
  OnChanges,
  Output,
  EventEmitter,
} from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Department } from 'src/app/_models/department';
import { DepartmentService } from 'src/app/_services/department.service';

@Component({
  selector: 'app-department-details',
  templateUrl: './department-details.component.html',
  styleUrls: ['./department-details.component.css'],
})
export class DepartmentDetailsComponent implements OnChanges {
  deptDetails: Department | null = null;
  // @Input() id = 0;
  // @Output() onHide: EventEmitter<boolean> = new EventEmitter<boolean>();
  // hide() {
  //   this.onHide.emit(false);
  // }
  constructor(
    public departmentService: DepartmentService,
    public activatedRoute: ActivatedRoute
  ) {}
  ngOnInit() {
    this.deptDetails = this.departmentService.getDepartmentById(
      this.activatedRoute.snapshot.params['id']
    );
  }
  ngOnChanges() {
    //   this.deptDetails = this.departmentService.getDepartmentById(this.id);
  }
}
