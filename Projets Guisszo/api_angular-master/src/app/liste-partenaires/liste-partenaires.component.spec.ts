import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListePartenairesComponent } from './liste-partenaires.component';

describe('ListePartenairesComponent', () => {
  let component: ListePartenairesComponent;
  let fixture: ComponentFixture<ListePartenairesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListePartenairesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListePartenairesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
