import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { JwtHelperService} from '@auth0/angular-jwt'


@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private Url="http://localhost:8000/api"
  private _reguserUrl="localhost:8000/api/regpart"

  private headers =  {headers:new HttpHeaders().set('authorization','Bearer ' +localStorage.getItem('token'))};
  //////////////////////////////////////////////////
  jwt: string
  username:string
  roles:Array<string>

// Injection de dépendance ici

  constructor(private http: HttpClient, private _route:Router) {}
 

    
    connexUtil(user):Observable<any>{
      return this.http.post<any>(this.Url+"/login",user,{observe:'response'})
    }

    getToken(){
      return localStorage.getItem('token')
    }

    saveToken(jwt:string){
      localStorage.setItem('token',jwt['token'])
      this.jwt=jwt['token']
      console.log(this.jwt)
      this.parseJWT()
    } 
parseJWT(){
let jwtHpelper = new JwtHelperService()
let ObjJWT=jwtHpelper.decodeToken(this.jwt)
this.username=ObjJWT.username
this.roles=ObjJWT.role
localStorage.setItem('username',this.username);
localStorage.setItem('role',ObjJWT.role);
return ObjJWT
}
getRole(){
  console.log(this.roles)

 return localStorage.getItem('role');
}

loadToken(){
  this.jwt=localStorage.getItem('token')
  this.parseJWT()
}
////////////////// ROLES///////////////////////////
    isSuperAdmin(){
      return this.roles.indexOf('ROLE_SUPER_ADMIN')>=0
    }

    isAdmin(){
      return this.roles.indexOf('ROLE_ADMIN')>=0
    }

    isCaissier(){
      return this.roles.indexOf('ROLE_CAISSIER')>=0
    }

    isPartenaire(){
      return this.roles.indexOf('ROLE_PARTENAIRE')>=0
    }

    isPartAdmin(){
      return this.roles.indexOf('ROLE_PARTENAIRE_ADMIN')>=0
    }

    isUser(){
      return this.roles.indexOf('ROLE_USER')>=0
    }

/////////////////// FIN ROLES //////////////////////    

     isConnected(){
      return !!localStorage.getItem('token')
     }

     logout(){
      localStorage.removeItem('token');
     this.initParams()
     }

     /**Permet de reinitialiser les parametres de connexion */
     initParams(){
      this.jwt=undefined
      this.username=undefined
      this.roles=undefined
      this._route.navigate(['/connexion']);
     }
   
     getListpart():Observable<any[]>{
   
       return this.http.get<any>(this.Url,this.headers)
     }
     
   
     getListUsers():Observable<any[]>{
   
       return this.http.get<any>(this.Url+"/listeusers",this.headers)
     }
}
