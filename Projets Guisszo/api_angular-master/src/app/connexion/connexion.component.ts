import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';
import  Swal  from 'sweetalert2';


@Component({
  selector: 'app-connexion',
  templateUrl: './connexion.component.html',
  styleUrls: ['./connexion.component.scss']
})
export class ConnexionComponent implements OnInit {

  register={}

  constructor( private _auth: AuthService, 
              private _route:Router
    ) { }

  ngOnInit() {
  }
  connexionUtil(){
    this._auth.connexUtil(this.register)
    .subscribe(
       resp =>{
        if(resp.status==209 || resp.status==208){
          Swal.fire({
            type: 'error',
            title:'Avertissement',
            text:  resp.body.message
            
            
            
          })
        }else{
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
          })
          
          Toast.fire({
            type: 'success',
            title:'Bienvenue '+ localStorage.getItem('username')
          })
        }
          console.log(resp)
          let jwt= resp.body
          this._auth.saveToken(jwt)
         
          this._route.navigate(['/utilisateur'])
        },
        error => console.log(error)
    )
  }

}
