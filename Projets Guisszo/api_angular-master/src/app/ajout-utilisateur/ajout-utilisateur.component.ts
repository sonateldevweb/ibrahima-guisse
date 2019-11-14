import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { UtilisateurService } from '../utilisateur.service';
import { Router, ActivatedRoute } from '@angular/router';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-ajout-utilisateur',
  templateUrl: './ajout-utilisateur.component.html',
  styleUrls: ['./ajout-utilisateur.component.scss']
})
export class AjoutUtilisateurComponent implements OnInit {
  imageUrl: string = "/assets/img/140x100.png";
  profiles
  comptes
  utilisateur = {}
  fileToUpload: File = null
  id= this.activeatedR.snapshot.params['id']

  constructor(private _auth: AuthService, private utile: UtilisateurService,
    private _route: Router,private activeatedR:ActivatedRoute) { }

  ngOnInit() {
    this.utile.Onepartenaire(this.id).subscribe(
      data => this.utilisateur=data
    )
    this.utile.selectProfile().subscribe(
      res => {
        console.log(res)
        this.profiles = res
        if (this._auth.getRole() == 'ROLE_SUPER_ADMIN' || this._auth.getRole() == 'ROLE_ADMIN') {
          this.profiles = [
            this.profiles[0], this.profiles[1]
          ]
        } else {
          this.profiles = [
            this.profiles[3], this.profiles[4]
          ]
        }

      },
      error => console.log(error)
    )
///////// Chargement de la liste des comptes /////
    this.utile.selectCompte().subscribe(
      resp =>{
        console.log(resp)
        this.comptes=resp
      },
      errores =>
      console.log(errores)
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

  ajoutUtil() {
    this.utile.registerUtil(this.utilisateur, this.fileToUpload)
      .subscribe(
        resp => {
          console.log(resp)
          this.imageUrl = "/assets/img/140x100.png"
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: resp.message,
            showConfirmButton: false,
            timer: 3500
          })
          this._route.navigate(['/utilisateur'])
        },
        error => console.log(error)

      )
  }

  isPartenaire() {
    return this._auth.isPartenaire()
  }

  isPartAdmin() {
    return this._auth.isPartAdmin()
  }


}

