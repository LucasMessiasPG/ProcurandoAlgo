import {Component} from "angular2/core";
import {Toast, ToastService} from "./toast-list.service";
import {ToastComponent} from "../toast-component/toast.component";
@Component({
    selector:'toast',
    template:`
    <div class="toast" [ngClass]="toast.class"  *ngFor="let toast of _toast; let i = index">
        <toast-component class="toast-component" [toast]="toast" (click)="close(toast)"></toast-component>
    </div>
    `,
    directives:[ToastComponent],
    styles:[`
    .toast{
      background-color: rgba(0,0,0,.4);
      width: 250px;
      color: white;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0,0,0,.4);
      padding: 5px;
      position: relative;
      margin-bottom: 10px;
      margin-top: 10px;
      cursor: pointer;
    }
    
    .toast.default{
      background-color: rgba(255,255,255,.4);
      color: #000;
    }
    
    .toast.success{
      background-color: #51a351;
      color: #fff;
    }
    
    .toast.error{
      background-color: #bd362f;
      color: #fff;
    }
    
    .toast.info{
      background-color: #2f96b4;
      color: #fff;
    }
    
    .toast.warning{
      background-color: #f89406;
      color: #fff;
    }
    `]
})

export class ToastListComponent{
    private _toast;
    private _types = ['defautl','success','error','warning','info'];

    constructor(private _toastService: ToastService) {
        this._toastService.toast$.subscribe(toast => this.addToast(toast))
    }


    addToast(toast: Toast){
        var _toast = this.setMsg(toast);
        let contain = false
        if(this._toast && this._toast.length > 0) {
            for (var i in this._toast) {
                if (this._toast[i].message ==  _toast.message) {
                    contain = true;
                }
            }
            if(contain == false)
                this._toast.push(_toast);
        }else{
            this._toast = [];
            this._toast.push(_toast);
        }
    }

    setMsg(toast): Toast{
        if(!toast.message){
            return null;
        }
        if(!toast.type || toast.type && this._types.indexOf(toast.type) < 0){
            toast.type = 'default'
        }

        toast.class = toast.type;

        if(!toast.title){
            toast.title = 'Aviso';
        }
        if(!toast.timer){
            toast.timer = 4000;
        }

        var self = this;
        setTimeout(function(){
            self._toast.splice(self._toast.indexOf(toast),1);

        },toast.timer)

        return toast
    }

    close(toast){
        this._toast.splice(this._toast.indexOf(toast),1)
    }
}