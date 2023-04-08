import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Subscription } from 'rxjs';
import { Department } from 'src/app/_models/department';
import { DepartmentService } from 'src/app/_services/department.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-department-details',
  templateUrl: './department-details.component.html',
  styleUrls: ['./department-details.component.css'],
})
export class DepartmentDetailsComponent {
  deptDetails: Department | null = null;
  s: Subscription | null = null;

  constructor(
    public departmentService: DepartmentService,
    public activatedRoute: ActivatedRoute,
    private router: Router
  ) {}
  ngOnInit() {
    // this.deptDetails = this.departmentService.getDepartmentById(
    //   this.activatedRoute.snapshot.params['id']
    // );
    this.s = this.activatedRoute.params.subscribe((a) => {
      this.deptDetails = this.departmentService.getDepartmentById(a['id']);
    });
  }
  ngOnDestroy() {
    this.s?.unsubscribe();
  }
  goBack() {
    this.router.navigateByUrl('/departments');
  }
}
