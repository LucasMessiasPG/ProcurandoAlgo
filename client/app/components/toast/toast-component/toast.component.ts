import {Component} from "angular2/core";
@Component({
    selector:'toast-component',
    template:`
    <div *ngIf="(toast && toast.message)" class="toast-text">
        <h3 class="toast-title">{{ toast.title }}</h3>
        <p class="toast-message">{{toast.message}}</p>
    </div> 
    <div *ngIf="(toast && toast.message)" class="toast-icon">
        <i *ngIf="toast.class == 'default'" class="fa fa-info-circle"></i>
        <i *ngIf="toast.class == 'success'" class="fa fa-check-circle"></i>
        <i *ngIf="toast.class == 'error'" class="fa fa-exclamation-triangle"></i>
        <i *ngIf="toast.class == 'info'" class="fa fa-info-circle"></i>
        <i *ngIf="toast.class == 'warning'" class="fa fa-exclamation-circle"></i>
    </div>
    `,
    inputs:['toast'],
    styles:[`
        .toast-component > div {
            display: inline-block;
        }
        .toast-text .toast-title{
            font-size: 18px;
            margin: 0px 50px;
            width: 98px;
            text-align: center;
        }
        .toast-text .toast-message{
            font-size: 14px;
            line-height: 14px;
            width: 199px;
            margin: 0;
        }
        .toast-icon{
            font-size: 40px;
            display: inline-block;
            top: 2px;
            position: absolute;
            right: 10px;
        }
    `]
})

export class ToastComponent{
    private toast

    ngOnInit()
    {
        // console.log(this.toast);
    }
}
