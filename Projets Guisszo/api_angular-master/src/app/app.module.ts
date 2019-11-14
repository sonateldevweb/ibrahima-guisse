import { BrowserModule } from '@angular/platform-browser';
import { MaterialModule } from './material/material.module';
import { NgModule } from '@angular/core';
import { Routes } from '@angular/router';
import { FormsModule, ReactiveFormsModule} from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AuthService } from './auth.service';

import { AppRoutingModule } from './app-routing.module'
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ConnexionComponent } from './connexion/connexion.component';
import { UtilisateurComponent } from './utilisateur/utilisateur.component';
import { ListePartenairesComponent } from './liste-partenaires/liste-partenaires.component';
import { ListeUtilisateursComponent } from './liste-utilisateurs/liste-utilisateurs.component';
import { AjouPartenaireComponent } from './ajou-partenaire/ajou-partenaire.component';
import { AjoutUtilisateurComponent } from './ajout-utilisateur/ajout-utilisateur.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { NavbarComponent } from './navbar/navbar.component';
import { CompteComponent } from './compte/compte.component';
import { EnvoieComponent } from './envoie/envoie.component';
import { RetraitComponent } from './retrait/retrait.component';
import { FooterComponent } from './footer/footer.component';
import { DepotComponent } from './depot/depot.component';
import { ConnexGuard } from './connex.guard';
import { TransactionService } from './transaction.service';
import { UtilisateurService } from './utilisateur.service';
import { PartenaireUsersComponent } from './partenaire-users/partenaire-users.component';


const routes: Routes=[
  {
    path:'', component:ConnexionComponent },
  {
    path:'connexion', component:ConnexionComponent },
  {
    path:'utilisateur', component:UtilisateurComponent }
    ,
  {
    path:'ajoutPart', component:AjouPartenaireComponent
  },
  {
    path: 'ajoutUtil', component:AjoutUtilisateurComponent
  },
  { path:'listePart', component:ListePartenairesComponent
  },
  {
    path: 'listeUtil', component:ListeUtilisateursComponent
  },
  {
    path: 'compte', component:CompteComponent
  },
  {
    path: 'envoie', component:EnvoieComponent
  },
  {
    path:'retrait', component: RetraitComponent
  },
  {
    path:'depot', component:DepotComponent
  },

  {
    path:'**', component:PageNotFoundComponent
  }
]
@NgModule({
  declarations: [
    AppComponent,
    ConnexionComponent,
    UtilisateurComponent,
    ListePartenairesComponent,
    ListeUtilisateursComponent,
    AjouPartenaireComponent,
    AjoutUtilisateurComponent,
    PageNotFoundComponent,
    NavbarComponent,
    CompteComponent,
    EnvoieComponent,
    RetraitComponent,
    FooterComponent,
    DepotComponent,
    PartenaireUsersComponent
  ],
  imports: [
    BrowserModule,
    MaterialModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    FormsModule
  ],
  providers: [
    AuthService,
    ConnexGuard,
    TransactionService,
    UtilisateurService],
  bootstrap: [AppComponent]
})
export class AppModule { }
