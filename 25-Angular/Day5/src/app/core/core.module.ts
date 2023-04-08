import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { SideComponent } from './side/side.component';
import { RouterModule } from '@angular/router';
@NgModule({
  declarations: [HeaderComponent, FooterComponent, SideComponent],
  imports: [CommonModule, RouterModule],
  exports: [HeaderComponent, FooterComponent, SideComponent],
})
export class CoreModule {}
