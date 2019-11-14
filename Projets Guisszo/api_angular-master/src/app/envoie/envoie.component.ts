import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { UtilisateurService } from '../utilisateur.service';
import { Router } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-envoie',
  templateUrl: './envoie.component.html',
  styleUrls: ['./envoie.component.scss']
})
export class EnvoieComponent implements OnInit {
envoie={}
username:string
nomcomplet:string
tel:string
email:string

afficher:boolean = false

  constructor(private utile:UtilisateurService, private route:Router) { }

  ngOnInit() {
  }
envoi()
{
  this.utile.envoi(this.envoie).subscribe(
    resp =>{
      console.log(resp)
      this.envoie=resp
      if(resp.status==208){
        Swal.fire({
          type: 'error',
          title: 'Desolé mais',
          text: resp.message
        })
      }else{
      Swal.fire({
        position: 'top-end',
        type: 'success',
        title: 'envoi effectué',
        showConfirmButton: false,
        timer: 1500
      })}
      this.username=resp.userEnvoi.username
      this.nomcomplet=resp.userEnvoi.nomcomplet
      this.tel=resp.userEnvoi.tel
      this.email=resp.userEnvoi.email
      this.afficher=true;
    },
    errores =>{
      console.log(errores)
    }
  )
}
  EnvoiForm = new FormGroup({

    nomcompletExpediteur: new FormControl('', [ Validators.maxLength(30),Validators.pattern(/^([a-zA-Z \u00C0-\u00FF]+['-]?[a-zA-Z\u00C0-\u00FF]+){1,30}$/), Validators.required,

    ]),
    telExpediteur: new FormControl('', [Validators.minLength(9), Validators.maxLength(15), Validators.required,
      Validators.pattern(/^7[0678]([0-9][0-9][0-9][0-9][0-9][0-9][0-9])/)

    ]),
    nomcompletRecepteur: new FormControl('', [ Validators.maxLength(30),Validators.pattern(/^([a-zA-Z \u00C0-\u00FF]+['-]?[a-zA-Z\u00C0-\u00FF]+){1,30}$/), 
    Validators.required,

    ]),
    
    telRecepteur: new FormControl('', [Validators.minLength(9), Validators.maxLength(15), Validators.required,
      Validators.pattern(/^7[0678]([0-9][0-9][0-9][0-9][0-9][0-9][0-9])/)

    ]),
    montant: new FormControl('', [Validators.maxLength(9), Validators.required,
      Validators.pattern('[0-9]+')
  
      ])
  })
  ///////////////////////messages de validation/////////////////////////
  //////////////////////////////////////////////////////////////////////

  envoi_validation_message = {

    'nomcompletExpediteur': [
      { type: 'required', message: 'Ce champ est requis' },
      { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' }
    ],
    'telExpediteur': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 9 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' },
    { type: 'pattern', message: 'le numero commencent par 77,78,76,70...' }
    ],
    'nomcompletRecepeteur': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 30 caracteres' }
    ],
    'telRecepteur': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 9 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' },
    { type: 'pattern', message: 'le numero commencent par 77,78,76,70...' }
    ],
    'montant': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 9 caracteres' },
    { type: 'pattern', message: 'Le montant ne contient que des chiffres' }
    ]

  }


}
