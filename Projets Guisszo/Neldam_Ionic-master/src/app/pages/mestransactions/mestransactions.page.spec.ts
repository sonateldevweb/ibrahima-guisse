import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MestransactionsPage } from './mestransactions.page';

describe('MestransactionsPage', () => {
  let component: MestransactionsPage;
  let fixture: ComponentFixture<MestransactionsPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MestransactionsPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MestransactionsPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
