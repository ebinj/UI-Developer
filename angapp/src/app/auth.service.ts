import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'

interface myData {
  success: boolean,
  message: string
}

@Injectable()
export class AuthService {

  private loggedInStatus = false

  constructor(private http: HttpClient) { }

  setLoggedIn(value: boolean) {
    this.loggedInStatus = value
  }

  get isLoggedIn() {
    return this.loggedInStatus
  }

  getUserDetails(username, password) {
    // post these details to API server return user info if correct
    return this.http.post<myData>('http://localhost/angapp/api/auth.php', {
      username,
      password
    })
  }

  insertUserDetails(name,email,password,mobile) {
    // post these details to API server return user info if correct
    return this.http.post<myData>('http://localhost/angapp/api/insert.php', {
      name,
      email,
      password,
      mobile
    })
  }



}
