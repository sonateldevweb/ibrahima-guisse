import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PartenaireUsersComponent } from './partenaire-users.component';

describe('PartenaireUsersComponent', () => {
  let component: PartenaireUsersComponent;
  let fixture: ComponentFixture<PartenaireUsersComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PartenaireUsersComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PartenaireUsersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
