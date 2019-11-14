import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { UtilisateurService } from '../utilisateur.service';
import { Router } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-depot',
  templateUrl: './depot.component.html',
  styleUrls: ['./depot.component.scss']
})
export class DepotComponent implements OnInit {
Depots = {}
compte={}
afficher:boolean=false;
  constructor( private utile:UtilisateurService,private route:Router) { }

  ngOnInit() {
  }


  findCompte(){
    this.utile.findCompte(this.DepotForm.value.numcompte).subscribe(
      rep=>{
        console.log(rep)
        this.compte=rep
        this.afficher=true;
      },
      err =>console.log(err)
    )
  }
  ///////////////////////////////////////

  depot(){
    
    this.utile.Depot(this.Depots).subscribe(
      resp =>{
        console.log(resp)
        if (resp.status==208){
          Swal.fire({
            type: 'error',
            title: 'Pour Info',
            text: resp.message
            
          })
         }else if(resp.status==200){
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: resp.message,
            showConfirmButton: false,
            timer: 5000
          })
         }
        // this.route.navigate(['/utilisateur'])
      },
      errores =>{
        console.log(errores)
      }
    )
  }

  DepotForm = new FormGroup({
    numcompte: new FormControl('',[Validators.minLength(13), Validators.maxLength(13), Validators.required,
      Validators.pattern('[0-9]+')]),
    montant: new FormControl('',[ Validators.required,
      Validators.pattern('[0-9]+')])
  })

  ///////////////////////messages de validation/////////////////////////
  //////////////////////////////////////////////////////////////////////

  part_validation_message = {

    'numcompte': [
      { type: 'required', message: 'Ce champ est requis' },
      { type: 'maxlength', message: 'Ce champ doit avoir au max 13 chiffres' },
      { type: 'minlength', message: 'Ce champ doit avoir au min 13 chiffres' },
      { type: 'pattern', message: 'Le numero  de compte ne doit contenir que des chiffres' }
    ],
    'montant': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'pattern', message: 'Le montant ne doit contenir que des chiffres' }
    ]

  }

}
