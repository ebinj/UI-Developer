import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

interface myData {
  message: string,
  success: boolean
}

interface isLoggedIn {
  status: boolean
}

interface logoutStatus {
  success: boolean
}
@Injectable()
export class UserService {

  constructor(private http: HttpClient) { }

  getSomeData() {
    return this.http.get<myData>('http://localhost/angapp/api/database.php')
  }


  getuser() {
    return this.http.get<myData>('http://localhost/angapp/api/user.php')
  }


  getthankData() {
    return this.http.get<myData>('http://localhost/angapp/api/thank.php')
  }

  isLoggedIn(): Observable<isLoggedIn> {
    return this.http.get<isLoggedIn>('http://localhost/angapp/api/isloggedin.php')
  }

  logout() {
    return this.http.get<logoutStatus>('http://localhost/angapp/api/logout.php')
  }

}
