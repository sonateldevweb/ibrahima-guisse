import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ConnexionComponent } from './connexion/connexion.component';
import { UtilisateurComponent } from './utilisateur/utilisateur.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { AjouPartenaireComponent } from './ajou-partenaire/ajou-partenaire.component';
import { AjoutUtilisateurComponent } from './ajout-utilisateur/ajout-utilisateur.component';
import { ListePartenairesComponent } from './liste-partenaires/liste-partenaires.component';
import { ListeUtilisateursComponent } from './liste-utilisateurs/liste-utilisateurs.component';
import { CompteComponent } from './compte/compte.component';
import { EnvoieComponent } from './envoie/envoie.component';
import { RetraitComponent } from './retrait/retrait.component';
import { DepotComponent } from './depot/depot.component';
import { NavbarComponent } from './navbar/navbar.component';
import { ConnexGuard } from './connex.guard';
import { PartenaireUsersComponent } from './partenaire-users/partenaire-users.component';


const routes: Routes = [
  {
    path:'', redirectTo:'/connexion',pathMatch:'full'
    
   
  },
  {
    path:'connexion', component:ConnexionComponent
  },
  {
    path:'utilisateur', component:UtilisateurComponent,

    canActivate:[ConnexGuard]
  }
  ,
  {
    path:'ajoutPart', component:AjouPartenaireComponent,

    canActivate:[ConnexGuard]
  },
  {
    path: 'ajoutUtil', component:AjoutUtilisateurComponent,

    canActivate:[ConnexGuard]
  },
  {
    path: 'ajoutUtil/:id', component:AjoutUtilisateurComponent,

    canActivate:[ConnexGuard]
  },
  { path:'listePart', component:ListePartenairesComponent,

  canActivate:[ConnexGuard]
  },
  { path:'ajoutPart/:id', component:AjouPartenaireComponent,

  canActivate:[ConnexGuard]
  },
  {
    path: 'listeUtil', component:ListeUtilisateursComponent,

    canActivate:[ConnexGuard]
  },
  {
    path:'listeUsers', component:PartenaireUsersComponent,
    canActivate:[ConnexGuard]
  },
  {
    path: 'compte', component:CompteComponent,

    canActivate:[ConnexGuard]
  },
  {
    path: 'envoie', component:EnvoieComponent,

    canActivate:[ConnexGuard]
  },
  {
    path: 'retrait', component:RetraitComponent,

    canActivate:[ConnexGuard]
  },
  {
    path: 'depot', component:DepotComponent,

    canActivate:[ConnexGuard]
  },
  {
    path:'navbar', component:NavbarComponent,

    canActivate:[ConnexGuard]
  },
  {
    path: '**', component:PageNotFoundComponent
  }
];

@NgModule({
  
  imports: [
    RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
