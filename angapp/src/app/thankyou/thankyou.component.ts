import { Component, OnInit } from '@angular/core';
import { UserService } from '../user.service';

@Component({
  selector: 'app-thankyou',
  templateUrl: './thankyou.component.html',
  styleUrls: ['./thankyou.component.css']
})
export class ThankyouComponent implements OnInit {

  message = "Loading...."

  constructor(private user: UserService) { }

  ngOnInit() {
    this.user.getthankData().subscribe(data => {
      this.message = data.message
    })
  }


}
