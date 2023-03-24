import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditInstructorComponent } from './edit-instructor.component';

describe('EditInstructorComponent', () => {
  let component: EditInstructorComponent;
  let fixture: ComponentFixture<EditInstructorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditInstructorComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EditInstructorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
