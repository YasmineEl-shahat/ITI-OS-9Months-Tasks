import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DeleteInstructorComponent } from './delete-instructor.component';

describe('DeleteInstructorComponent', () => {
  let component: DeleteInstructorComponent;
  let fixture: ComponentFixture<DeleteInstructorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DeleteInstructorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(DeleteInstructorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
