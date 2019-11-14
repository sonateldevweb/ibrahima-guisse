import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { UtilisateurService } from '../utilisateur.service';
import {ActivatedRoute, Router } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-ajou-partenaire',
  templateUrl: './ajou-partenaire.component.html',
  styleUrls: ['./ajou-partenaire.component.scss']
})
export class AjouPartenaireComponent implements OnInit {
  fileToUpload: File = null
  partenaire = {}
  imageUrl: string = "/assets/img/140x100.png";
  srcResult
  id= this.activeatedR.snapshot.params['id']

  constructor(private utile: UtilisateurService, private _route: Router,private activeatedR:ActivatedRoute) { }

  ngOnInit() {
    this.utile.Onepartenaire(this.id).subscribe(
      data => this.partenaire=data
    )
  }

  ajoutPart() {
    this.utile.ajoutPart(this.partenaire, this.fileToUpload)
      .subscribe(
        resp => {
          console.log(resp)
          this.imageUrl = "/assets/img/140x100.png"
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          })

          Toast.fire({
            type: 'success',
            title: resp.message
          })
          this._route.navigate(['/listePart'])
        },
        error => console.log(error)

      )
  }

  handleFileInput(file: FileList) {

    this.fileToUpload = file.item(0)


    var reader = new FileReader()
    reader.onload = (event: any) => {
      this.imageUrl = event.target.result
    }
    reader.readAsDataURL(this.fileToUpload)
  }

  PartenairesForm = new FormGroup({

    raisonsociale: new FormControl('', [Validators.minLength(3), Validators.maxLength(15), Validators.required,

    ]),
    ninea: new FormControl('', [Validators.minLength(8), Validators.maxLength(8), Validators.required,
    Validators.pattern('[0-9]+')

    ]),
    username: new FormControl('', [Validators.minLength(5), Validators.maxLength(15), Validators.required,

    ]),
    password: new FormControl('', [Validators.minLength(4), Validators.maxLength(10), Validators.required,

    ]),
    image: new FormControl('', [Validators.required

    ]),
    nomcomplet: new FormControl('', [Validators.minLength(5), Validators.maxLength(30), Validators.required,

    ]),
    adresse: new FormControl('', [Validators.minLength(7), Validators.maxLength(30), Validators.required,

    ]),
    telephone: new FormControl('', [Validators.minLength(9), Validators.maxLength(15), Validators.required,
    Validators.pattern('[0-9]+')

    ]),
    email: new FormControl('', [Validators.minLength(7), Validators.required,
    Validators.pattern('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$')

    ]),
  })
  ///////////////////////messages de validation/////////////////////////
  //////////////////////////////////////////////////////////////////////

  part_validation_message = {

    'raisonsociale': [
      { type: 'required', message: 'Ce champ est requis' },
      { type: 'minlength', message: 'Ce champ doit avoir au min 3 caracteres' },
      { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' }
    ],
    'ninea': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 8 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 8 caracteres' },
    { type: 'pattern', message: 'Le ninea ne contient que des chiffres' }
    ],
    'username': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 5 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' }
    ],
    'password': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 4 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 10 caracteres' }
    ],
    'image': [{ type: 'required', message: 'Veuillez inserer une image' },

    ],
    'nomcomplet': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 5 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 30 caracteres' }
    ],
    'adresse': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 7 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 30 caracteres' }
    ],
    'telephone': [{ type: 'required', message: 'Ce champ est requis' },
    { type: 'minlength', message: 'Ce champ doit avoir au min 9 caracteres' },
    { type: 'maxlength', message: 'Ce champ doit avoir au max 15 caracteres' },
    { type: 'pattern', message: 'Le telephone ne contient que des chiffres' }
    ],
    'email': [
      { type: 'required', message: 'Ce champ est requis' },
      { type: 'pattern', message: 'Entrer un Email Valide' }
    ],

  }

}
