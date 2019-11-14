import { TestBed, async, inject } from '@angular/core/testing';

import { ConnexGuard } from './connex.guard';

describe('ConnexGuard', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ConnexGuard]
    });
  });

  it('should ...', inject([ConnexGuard], (guard: ConnexGuard) => {
    expect(guard).toBeTruthy();
  }));
});
