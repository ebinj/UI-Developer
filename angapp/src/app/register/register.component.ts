import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  constructor(private Auth: AuthService, 
              private router: Router) { }

  ngOnInit() {
  }

  loginUser(event) {
    event.preventDefault()
    const target = event.target
    const name = target.querySelector('#name').value
    const password = target.querySelector('#password').value
    const email = target.querySelector('#email').value
    const mobile = target.querySelector('#mobile').value

    this.Auth.insertUserDetails(name,email,password,mobile).subscribe(data => {
      if(data.success) {
        this.router.navigate(['thankyou'])
        //this.Auth.setLoggedIn(true)
      } else {
        window.alert(data.message)
      }
    })
    console.log(name, password)
  }

}

