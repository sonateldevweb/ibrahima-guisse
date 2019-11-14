import { Component, OnInit, ViewChild, ElementRef } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { UtilisateurService } from '../utilisateur.service';
import { Router } from '@angular/router';
import Swal from 'sweetalert2';
import * as jsPDF from 'jspdf';

@Component({
  selector: 'app-retrait',
  templateUrl: './retrait.component.html',
  styleUrls: ['./retrait.component.scss']
})
export class RetraitComponent implements OnInit {
retrait = {}
codeTransaction ={}
username:string
nomcomplet:string
tel:string
email:string
afficher:boolean = false
@ViewChild('Aimprimer')Aimprimer:ElementRef

public  downloadPDF() {
  let doc = new jsPDF("p", "pt", "a4")
  let specialElementHandlers={
    
    '#Aimprimer':function(element, renderer){
      return true
    }
  };
  let Aimprimer =  this.Aimprimer.nativeElement
  doc.fromHTML(Aimprimer.innerHTML,30,30,{
    'width':500,
    'elementHandlers':specialElementHandlers
  });
  doc.save('recuRetrait.pdf')
}

  constructor(private utile:UtilisateurService, private route:Router) { }

  ngOnInit() {
  }
  Retrait(){
    this.utile.retrait(this.retrait).subscribe(
      resp =>{
        console.log(resp)
        this.retrait=resp
       if (resp.status==201){
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: resp.message,
            showConfirmButton: false,
            timer: 1500
          })
         }
        //this.route.navigate(['/utilisateur'])
      },
      errores =>{
        console.log(errores)
      }
    )
  }

  findCode(){
    this.utile.findCode(this.RetraitForm.value.codeTransaction).subscribe(
      rep =>{
       console.log(rep)

       if(rep.status==208 || rep.status == 209){
        Swal.fire({
          type: 'error',
          title: 'Désolé',
          text:rep.message
          
        })
       }
       this.codeTransaction=rep
       this.username =rep.userRetrait.username
       this.nomcomplet =rep.userRetrait.nomcomplet
       this.tel =rep.userRetrait.tel
       this.email =rep.userRetrait.email
       this.afficher =true
     
      },
      erreure => console.log(erreure)
    )
  }

  RetraitForm = new FormGroup({
    codeTransaction: new FormControl('',[Validators.minLength(14), Validators.maxLength(14), Validators.required]),

      CNIrecepteur: new FormControl('',[ Validators.minLength(14), Validators.maxLength(14),Validators.required,
      Validators.pattern('[0-9]+')])
  })

  ///////////////////////messages de validation/////////////////////////
  //////////////////////////////////////////////////////////////////////

  part_validation_message = {

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
