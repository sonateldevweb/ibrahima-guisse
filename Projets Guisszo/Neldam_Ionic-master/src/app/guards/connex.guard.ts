import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { AuthService } from '../services/auth.service';

@Injectable({
 providedIn: 'root'
})
export class ConnexGuard implements CanActivate {
  constructor(
    private auth: AuthService,
    private _route:Router){}
 canActivate(
   next: ActivatedRouteSnapshot,
   state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {


   if (this.auth.isConnected()) { //verifie si le token existe!
     return true;
   } else {
    this._route.navigateByUrl('home')
     return false;
   }
 }
}