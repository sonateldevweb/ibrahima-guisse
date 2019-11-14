import { Observable } from 'rxjs';
import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { TransactService } from 'src/app/services/transact.service';


@Component({
  selector: 'app-transactions',
  templateUrl: './transactions.page.html',
  styleUrls: ['./transactions.page.scss'],
})
export class TransactionsPage implements OnInit {

  envoie={}
username:string
nomcomplet:string
tel:string
email:string
codeTransaction:string

afficher:boolean = false
codeOK:boolean = false
  constructor(private trans:TransactService, private route:Router) { }

  ngOnInit() {
  }
  Transactions()
{
  console.log(this.TransactionForm.value)
  if(!this.afficher){ // on teste sur le boolean pour pouvoir decider sur quelle transaction faire
  this.trans.envoi(this.TransactionForm.value).subscribe(
    resp =>{
      console.log(resp)
      this.envoie=resp
    
      this.username=resp.userEnvoi.username
      this.nomcomplet=resp.userEnvoi.nomcomplet
      this.tel=resp.userEnvoi.tel
      this.email=resp.userEnvoi.email
      this.codeTransaction=resp.userEnvoi.codeTransaction
      this.route.navigateByUrl('dashboard')
    },
    errores =>{
      console.log(errores)
    }
  )
 }
 else{
  this.trans.retrait(this.TransactionForm.value).subscribe(
    resp =>{
      console.log(resp)
      this.route.navigateByUrl('dashboard')
   
    },
    errores =>{
      console.log(errores)
    }
  )
 }
}

afficherRetrait(){
  this.afficher=true;
}
afficherEnvoi(){
  this.afficher=false;
}

findCode(){
  this.trans.findCode(this.TransactionForm.value.codeTransaction).subscribe(
    rep =>{
     console.log(rep)

     
    //  this.codeTransaction=rep
    //  this.nomcomplet =rep.userRetrait.nomcomplet
    //  this.tel =rep.userRetrait.tel
    //  this.email =rep.userRetrait.email
     this.codeOK=true;
    },
    erreure => console.log(erreure)
  )
}
tarif //tarif de la transaction

trouvertarif(){
  this.trans.Trouvertarif(this.TransactionForm.value.montant).subscribe(
    resp =>{
      this.tarif = resp[0].valeur
      console.log(resp[0].valeur)
    },
    erreure => console.log(erreure)
  )
}
  TransactionForm = new FormGroup({

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
  
      ]),
      codeTransaction: new FormControl('',[Validators.minLength(14), Validators.maxLength(14), Validators.required]),

      CNIrecepteur: new FormControl('',[ Validators.minLength(14), Validators.maxLength(14),Validators.required,
      Validators.pattern('[0-9]+')])
  })
  ///////////////////////messages de validation/////////////////////////
  //////////////////////////////////////////////////////////////////////

  transaction_validation_message = {

    'nomcompletExpediteur': [
      { type: 'required', message: 'Ce champ est requis' },
      { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' }
    ],
    'telExpediteur': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 9 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' },
    { type: 'pattern', message: 'le numero commencent par 77,78,76,70...' }
    ],
    'nomcompletRecepteur': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 30 caracteres' }
    ],
    'telRecepteur': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 9 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' },
    { type: 'pattern', message: 'le numero commencent par 77,78,76,70...' }
    ],
    'montant': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 9 caracteres' },
    { type: 'pattern', message: 'Le montant ne contient que des chiffres' },
    
    ],
    'codeTransaction': [
      { type: 'required', message: 'Ce champ est requis' },
      { type: 'maxlength', message: 'Ce champ doit avoir au max 12 chiffres' },
      { type: 'minlength', message: 'Ce champ doit avoir au min 12 chiffres' },
    ],
    'CNIrecepteur': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 14 chiffres' },
      { type: 'minlength', message: 'Ce champ doit avoir au min 14 chiffres' },
    { type: 'pattern', message: 'Le CNI ne doit contenir que des chiffres' }
    ]

  }

}
