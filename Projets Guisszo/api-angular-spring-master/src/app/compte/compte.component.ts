import { Component, OnInit } from '@angular/core';
import { UtilisateurService } from '../utilisateur.service';
import { Router } from '@angular/router';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-compte',
  templateUrl: './compte.component.html',
  styleUrls: ['./compte.component.scss']
})
export class CompteComponent implements OnInit {

Comptes = {}
ninea = {}
username:string
nomcomplet:string
tel:string
email:string

afficher:boolean = false

  constructor(private utile:UtilisateurService, private route:Router) { }

  ngOnInit() {}
  createCpt(){
    this.utile.createCpt(this.Comptes).subscribe(
      resp =>{
        this.Comptes = resp
        this.route.navigate(['/utilisateur'])
      },
      error=> {
        console.log(error)
      }
    )
  }
////////////////////////////////////////////////////////
findNinea(){
  this.utile.findNinea(this.CompteForm.value.ninea).subscribe(
    rep=>{
      console.log(rep)
      this.ninea=rep
      this.username=rep.utilisateurs[0].username
      this.nomcomplet=rep.utilisateurs[0].nomcomplet
      this.tel=rep.utilisateurs[0].tel
      this.email=rep.utilisateurs[0].email
      this.afficher=true;
    },
    err =>console.log(err)
  )
}
  CompteForm= new FormGroup({
    ninea: new FormControl('', [Validators.minLength(8), Validators.maxLength(8), Validators.required,
      Validators.pattern('[0-9]+')
  
      ])
  })

  compte_validation_messsage={
    'ninea': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 8 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 8 caracteres' },
    { type: 'pattern', message: 'Le ninea ne contient que des chiffres' }
    ]
  }

}
