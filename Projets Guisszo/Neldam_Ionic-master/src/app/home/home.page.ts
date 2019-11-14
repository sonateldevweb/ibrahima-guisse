import { Component } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Router } from '@angular/router';
import { LoadingController } from '@ionic/angular';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  register={}
  private loading;

  constructor( private _auth: AuthService, 
              private _route:Router,
              private loadingctrl:LoadingController
    ) { }

  ngOnInit() {
  }
  Connexion = new FormGroup({
    username: new FormControl('',Validators.required),
    password: new FormControl('',Validators.required)
  })
  connexionUtil(donner){
    this.loadingctrl.create({
      message: 'Connexion...'
    }).then((overlay)=>{ this.loading = overlay;
      this.loading.present();
    
    });
    this._auth.connexUtil(donner)
    .subscribe(
       resp =>{
          
          console.log(resp)
          let jwt= resp.body
          this._auth.saveToken(jwt)
          setTimeout(()=>{
            this.loading.dismiss();
            this._route.navigateByUrl('dashboard')
          },4000)  
          
        },
        error => console.log(error)
    )
  }

}
