import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { observable, Observable } from 'rxjs';
import { Utilisateur } from './models/utilisateur';


@Injectable({
  providedIn: 'root'
})
export class UtilisateurService {

  /*****************instatiation du header***********************/
  private headers = { headers: new HttpHeaders().set('authorization', 'Bearer ' + localStorage.getItem('token')) };
  /////////////////////////////////////////////////////////////////
  private Url = "http://localhost:8000/api"
  private Jurl = "http://localhost:8080"

  /*****************************************************************/

  constructor(private http: HttpClient, private route: Router) { }
  ////////////////////////////////////////////////////////////////

  /** Partie registration ou encore ajour enfrancais */
  registerUtil(user, fileToUpload) {
    const endpoint = this.Url + "/registeruser"
    const formData: FormData = new FormData()

    formData.append('username', user.username);
    formData.append('password', user.password);
    formData.append('nomcomplet', user.nomcomplet);
    formData.append('profil', user.profil);
    formData.append('adresse', user.adresse);
    formData.append('compte', user.compte);
    formData.append('email', user.email);
    formData.append('tel', user.tel);
    formData.append('imageName', fileToUpload, fileToUpload.name);

    return this.http.post<any>(endpoint, formData, this.headers)
  }
  ///////////////////////////////////////////////////////////////////
  ////////////////// BLOC AJOUT D'UN PARTENAIRE/////////////////////
  ///////////////////////////////////////////////////////////////////
  ajoutPart(user, fileToUpload) {
    const endpoint = this.Url + "/regpart"
    const formData: FormData = new FormData()

    formData.append('raisonSociale', user.raisonSociale);
    formData.append('ninea', user.ninea);
    formData.append('username', user.username);
    formData.append('password', user.password);
    formData.append('nomcomplet', user.nomcomplet);
    formData.append('adresse', user.adresse);
    formData.append('tel', user.tel);
    formData.append('email', user.email);
    formData.append('imageName', fileToUpload, fileToUpload.name);

    return this.http.post<any>(endpoint, formData, this.headers)
  }

  ////////////////////////////////////////////////////////////////////
  /** partie Recuperation ou encore get*** */


  getListpart(): Observable<any[]> {

    return this.http.get<any>(this.Url, this.headers)
  }
//////////////////////////////////////////////////////////////////////////
  getListUsers(): Observable<Utilisateur[]> {

    // return this.http.get<Utilisateur[]>(this.Url + "/listeusers", this.headers)
    return this.http.get<Utilisateur[]>(this.Jurl + "/user/listeusers", this.headers)
  }
  //////////////////////////////////////////////////////////////////////////
  getPartUsers(): Observable<Utilisateur[]> {

    return this.http.get<Utilisateur[]>(this.Url + "/Partusers", this.headers)
  }
  ///////////////////////////////////////////////////////////////////////////
  getListPartenaires(): Observable<Utilisateur[]> {

    return this.http.get<Utilisateur[]>(this.Url + "/listePartenaires", this.headers)
  }
//////////////////////////////////////////////////////////////////////////
  modifPartStat(id: number) {
    const data={
      id:id
    }
   return this.http.put<any>(this.Url+"/modif_user/"+ id,data, this.headers);
  }
//////////////////////////////////////////////////////////////////////////
  selectProfile(): Observable<any[]> {
    return this.http.get<any>(this.Url + "/selecProfile", this.headers)
  }
//////////////////////////////////////////////////////////////////////////
  Depot(data){
    const endpoint = this.Url + "/depot"
    return this.http.post<any>(endpoint,data,this.headers)

  }
//////////////////////////////////////////////////////////////////////////
  envoi(data){
    const endpoint = this.Url + "/envoi"
    const formData: FormData = new FormData()
    formData.append('nomcompletExpediteur', data.nomcompletExpediteur);
    formData.append('telExpediteur', data.telExpediteur);
    formData.append('nomcompletRecepteur', data.nomcompletRecepteur);
    formData.append('telRecepteur', data.telRecepteur);
    formData.append('montant', data.montant);
    return this.http.post<any>(endpoint,formData, this.headers)
  }
//////////////////////////////////////////////////////////////////////////
  retrait(data){
    const endpoint = this.Url + "/retrait"
    const formData: FormData = new FormData()
    formData.append('codeTransaction', data.codeTransaction);
    formData.append('CNIrecepteur', data.CNIrecepteur);
   
    return this.http.post<any>(endpoint,formData, this.headers)
  }
//////////////////////////////////////////////////////////////////////////
  createCpt(data){
    const endpoint = this.Url + "/createCpt"
    const formData: FormData = new FormData()
    formData.append('ninea', data.ninea);
    return this.http.post<any>(endpoint,formData, this.headers)
  }
  selectCompte(): Observable<any[]> {
    return this.http.get<any>(this.Url + "/selectCompte", this.headers)
  }
//////////////////////////////////////////////////////////////////////////
  findCompte(numeroCompte:string):Observable<any>{
    const data={
      numcompte:numeroCompte
    }
    return this.http.post<any>(this.Url+"/findCompte", data,this.headers)
  }
  //////////////////////////////////////////////////////////////////////////

  PartUserStat(id:number) {
   return this.http.get<any>(this.Url+"/modif_partuser/"+ id, this.headers);
  }
  //////////////////////////////////////////////////////////////////////////////////////
  findNinea(ninea:string):Observable<any>{
    const data={
      ninea:ninea
    }
    return this.http.post<any>(this.Url+"/findNinea", data,this.headers)
  }
  ////////////////////////////////////////////////////////////////////////////////////////

  findCode(codeTransaction:string):Observable<any>{
    const data={
      codeTransaction:codeTransaction
    }
    return this.http.post<any>(this.Url+"/findCode", data,this.headers)
  }
  //////////////////////////////////////////////////////////////////////////////////////////
  Onepartenaire(id){
    
    return this.http.get<any>(this.Url+"/onepart/"+id,this.headers)

  }
}
