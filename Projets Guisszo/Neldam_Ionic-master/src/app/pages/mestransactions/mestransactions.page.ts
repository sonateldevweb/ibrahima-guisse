import { Observable } from 'rxjs';
import { Component, OnInit, ViewChild } from '@angular/core';
import { IonSegment } from '@ionic/angular';
import { TransactService } from 'src/app/services/transact.service';

@Component({
  selector: 'app-mestransactions',
  templateUrl: './mestransactions.page.html',
  styleUrls: ['./mestransactions.page.scss'],
})
export class MestransactionsPage implements OnInit {
  transactions
  transactionsretrait
afficher:boolean = false
transact:boolean
  @ViewChild(IonSegment,{static:false}) segment:IonSegment;
  constructor(private trans:TransactService) { }

  ngOnInit() {
 
  }

  segmentChanged(event){
    const valSegment = event.detail.value
    console.log(valSegment)
  }
  afficherTransEnvoi(){
    this.trans.TransactListEnv().subscribe(
      resp =>{
       this.transactions= resp
       console.log(this.transactions)
      }
    ) 
  }

  afficherTransRetrait(){
    this.trans.TransactListRetrait().subscribe(
      resp =>{
       this.transactions= resp
       console.log(this.transactions)
      }
    ) 
  }

  afficherTrans(){
   
    this.transact = true
  }
  afficherComm(){
   
    this.transact = false
  }
}
