import { Component, OnInit, ViewChild } from '@angular/core';
import { Utilisateur } from '../models/utilisateur';
import { MatTableDataSource } from '@angular/material/table';
import { MatPaginator } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { UtilisateurService } from '../utilisateur.service';
import { Router } from '@angular/router';
import  Swal  from 'sweetalert2';


@Component({
  selector: 'app-partenaire-users',
  templateUrl: './partenaire-users.component.html',
  styleUrls: ['./partenaire-users.component.scss']
})
export class PartenaireUsersComponent implements OnInit {

  displayedColumns: string[] = ['username', 'nomcomplet', 'tel', 'email','adresse','roles','statut','details'];
  Utilisateurs: Utilisateur[]
  dataSource: MatTableDataSource<Utilisateur>;
  @ViewChild(MatPaginator) paginator: MatPaginator;
  @ViewChild(MatSort) sort: MatSort;
  
  
  constructor(private utile:UtilisateurService,private route:Router) { 
  
  }
  

  ngOnInit() {
    this.utile.getPartUsers().subscribe(
      resp =>{
        
        this.Utilisateurs=resp;
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
