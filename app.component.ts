import { Component, OnInit, ViewChild, OnDestroy } from '@angular/core';
import { FormGroup, FormBuilder, FormControl  } from '@angular/forms';
import { Subject } from 'rxjs';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent implements OnInit{
  title = 'test_ang';
  // public formInput :FormGroup;
  public arrKata=''
  public str1 =''
  public str2 =''


  // constructor(){});
  ngOnInit(){
  
  }

  onSubmit(){
    
    var arrAng=[];
    var kata=this.arrKata;
    var arr = kata.split(',');
    var check= true;
    for (let index = 0; index < arr.length; index++) {
      for (let idx = 0; idx < arr.length; idx++) {
        var n1 =arr[index];
        var n2 = arr[idx]
        if(n1.length == n2.length){
          const arrn1=Array.from(n1);
          const arrn2=Array.from(n2);
          var sarrn1= arrn1.sort()
          var sarrn2= arrn2.sort()
          for (let i = 0; i < sarrn1.length; i++){
            if (sarrn1[i] != sarrn2[i]){
              check= false
            }
          }
          if(check==true){
              arrAng.push(n1);
              arrAng.push(n2);
                    
          }else{
            arrAng.push(n1);
            arrAng.push(n2);
          }
        }
      }
      
    }
    var ang="";
    let unique = arrAng.filter((item, i, ar) => ar.indexOf(item) === i);
    for (let index = 0; index < unique.length; index++) {
      if(index==0){
        ang ="["+ ang+ unique[index];
      }else if(index !=0 && index < unique.length){
        if(unique[index].length==unique[index-1].length){
          ang =ang+","+unique[index]
        }else{
          ang=ang+"],["+unique[index]
        }
      }else{
        ang=ang+"],["+unique[index]
      }
      
    }
    ang= ang+"]"
    this.title= ang
  }
   
  }
  
  
 



