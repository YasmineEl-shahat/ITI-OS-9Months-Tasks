import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { InstructorListComponent } from './instructor-list/instructor-list.component';
import { AddInstructorComponent } from './add-instructor/add-instructor.component';
import { EditInstructorComponent } from './edit-instructor/edit-instructor.component';
import { DeleteInstructorComponent } from './delete-instructor/delete-instructor.component';
import { InstructorDetailsComponent } from './instructor-details/instructor-details.component';
import { SharedModule } from '../shared/shared.module';

@NgModule({
  declarations: [
    InstructorListComponent,
    AddInstructorComponent,
    EditInstructorComponent,
    DeleteInstructorComponent,
    InstructorDetailsComponent,
  ],
  imports: [CommonModule, SharedModule],
  exports: [
    InstructorListComponent,
    AddInstructorComponent,
    EditInstructorComponent,
    DeleteInstructorComponent,
    InstructorDetailsComponent,
  ],
})
export class InstructorModule {}
