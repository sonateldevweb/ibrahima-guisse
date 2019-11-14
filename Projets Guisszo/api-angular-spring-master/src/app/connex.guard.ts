import { Injectable } from '@angular/core';
import { CanActivate,Router } from '@angular/router';
import { AuthService } from './auth.service';
@Injectable({
  providedIn: 'root'
})
export class ConnexGuard implements CanActivate {
  
  constructor(private _auth:AuthService,
              private _route:Router){}


  ///////////// definition de la methode canActivat///////////////

  canActivate(): boolean {
    /*** on verifie si l'utilisateur est connecté */

    if(this._auth.isConnected()){
/**si oui is conneced est valide */


      return true


    }else{
/** dans le cas contraire on le redirige vers la page de connexion */
this._route.navigate(['/connexion'])
      return false
    }
  }
  
}
