import { HttpHeaders, HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TransactService {

  private headers = { headers: new HttpHeaders().set('authorization', 'Bearer ' + localStorage.getItem('token')) };
  /////////////////////////////////////////////////////////////////
  private Url = "http://localhost:8000/api"

  /*****************************************************************/

  constructor(private http: HttpClient) { }
  ////////////////////////////////////////////////////////////////
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

  findCode(codeTransaction:string):Observable<any>{
    const data={
      codeTransaction:codeTransaction
    }
    return this.http.post<any>(this.Url+"/findCode", data,this.headers)
  }
  Trouvertarif(montant:number):Observable<any>{
    const data ={
      montant:montant
    }
    return this.http.post<any>(this.Url+"/Trouvertarif",data,this.headers)
  }
  TransactListEnv():Observable<any[]>{
    return this.http.get<any>(this.Url+"/listeTransactionsEnv",this.headers)
  }
  TransactListRetrait():Observable<any[]>{
    return this.http.get<any>(this.Url+"/listeTransactionsRetrait",this.headers)
  }
}
