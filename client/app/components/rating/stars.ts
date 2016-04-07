import {Component} from "angular2/core";
import {Input} from "angular2/core";
import {Output} from "angular2/core";
@Component({
    selector:'stars',
    template: `<a><i class="fa" [class.fa-star]="check(true)" [class.fa-star-o]="check(false)"></i></a>`,
    host:{
        '(mouseenter)': 'changeClass(true)',
        '(mouseleave)': 'changeClass(false)'
    }
})

export class StarCompoent{
    public _check = false;

    @Output() return = (() => this._check);

    @Input() set value(val){
        this._check = val.rate;
    }

    changeClass(status){
        this._check = status;
    }

    check(status){
        if(status == this._check){
            return true;
        }else{
            return false;
        }
    }
}