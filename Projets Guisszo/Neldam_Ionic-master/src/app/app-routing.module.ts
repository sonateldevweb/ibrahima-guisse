import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import { from } from 'rxjs';
import { DashboardPage } from './pages/dashboard/dashboard.page';
import { ConnexGuard } from './guards/connex.guard';

const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)},
  {
    path:'dashboard', loadChildren: './pages/dashboard/dashboard.module#DashboardPageModule',
    canActivate:[ConnexGuard],
  },
  { path: 'transactions', loadChildren: './pages/transactions/transactions.module#TransactionsPageModule',
    canActivate:[ConnexGuard]
  },
  { path: 'mestransactions', loadChildren: './pages/mestransactions/mestransactions.module#MestransactionsPageModule',
  canActivate:[ConnexGuard]
}
  
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
