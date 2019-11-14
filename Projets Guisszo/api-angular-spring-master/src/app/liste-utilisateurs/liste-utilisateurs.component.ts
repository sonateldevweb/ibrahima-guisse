import { Component, OnInit, ViewChild } from '@angular/core';
import { MatTableDataSource } from '@angular/material/table';
import { Utilisateur } from '../models/utilisateur';
import { MatSort } from '@angular/material/sort';
import { MatPaginator } from '@angular/material/paginator';
import { Router } from '@angular/router';
import { UtilisateurService } from '../utilisateur.service';
import { AuthService } from '../auth.service';
import  Swal  from 'sweetalert2';

@Component({
  selector: 'app-liste-utilisateurs',
  templateUrl: './liste-utilisateurs.component.html',
  styleUrls: ['./liste-utilisateurs.component.scss']
})
export class ListeUtilisateursComponent implements OnInit {
  displayedColumns: string[] = ['username', 'nomcomplet', 'tel', 'email','adresse','roles','statut','details'];
  Utilisateurs: Utilisateur[]
  dataSource: MatTableDataSource<Utilisateur>;
  @ViewChild(MatPaginator) paginator: MatPaginator;
  @ViewChild(MatSort) sort: MatSort;
  
  
  constructor(private utile:UtilisateurService,private route:Router,private _auth:AuthService) { 
  
  }
  

  ngOnInit() {
    this.utile.getListUsers().subscribe(
      resp =>{

        this.Utilisateurs=resp;
        console.log(resp[0])
        console.log(this.Utilisateurs)
        this.dataSource = new MatTableDataSource(this.Utilisateurs);
        this.dataSource.paginator = this.paginator;
        this.dataSource.sort = this.sort;
      },
      errores =>{
        console.log(errores)
      }
    )
    
  }

  applyFilter(filterValue: string) {
    this.dataSource.filter = filterValue.trim().toLowerCase();

    if (this.dataSource.paginator) {
      this.dataSource.paginator.firstPage();
    }
  }
  
//////////////////////////////////////////////////

      bloquerPart(id:number){
        this.utile.modifPartStat(id)
        
      }
////////////////////////////////////////////////////

IsSuperAdmin(){
  return this._auth.isSuperAdmin()
}
IsAdmin(){
  return this._auth.isAdmin()
}

PartUserStat(id:number){
  this.utile.PartUserStat(id).subscribe(
    res =>{
     
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  })
  
  Toast.fire({
    type: 'success',
    title: res.message
  })
  this.ngOnInit()
    }
    
  )
  
  }

}
