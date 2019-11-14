import { Component, OnInit } from '@angular/core';
import { AuthService} from '../auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {
titre="NeldaMoney"


  constructor(private auth:AuthService) { }

  ngOnInit() {

    this.auth.loadToken()
  }

  isSuperAdmin(){
    return this.auth.isSuperAdmin()
  }

  isAdmin(){
    return this.auth.isAdmin()
  }

  isCaissier(){
    return this.auth.isCaissier()
  }

  isPartenaire(){
    return this.auth.isPartenaire()
  }

  isPartAdamin(){
  return this.auth.isPartAdmin()
  }
  isUser(){
    return this.auth.isUser()
  }
  role(){
    return this.auth.getRole()
  }
 
logout(){
  this.auth.logout()
}

}

