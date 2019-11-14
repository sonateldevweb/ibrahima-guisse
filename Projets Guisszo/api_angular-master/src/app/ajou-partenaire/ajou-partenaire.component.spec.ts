import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AjouPartenaireComponent } from './ajou-partenaire.component';

describe('AjouPartenaireComponent', () => {
  let component: AjouPartenaireComponent;
  let fixture: ComponentFixture<AjouPartenaireComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AjouPartenaireComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AjouPartenaireComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
