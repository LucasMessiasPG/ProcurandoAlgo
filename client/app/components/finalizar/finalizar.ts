import {Component} from "angular2/core";
import {Router} from "angular2/router";
import {ROUTER_DIRECTIVES} from "angular2/router";
@Component({
    templateUrl:'../app/components/finalizar/finalizar.html',
    directives:[ROUTER_DIRECTIVES]
})

export class FinalizarComponent{

    public dados;
    constructor(private route: Router){
        if(localStorage.getItem('produto')){
            localStorage.removeItem('produto');
        }else{
            this.route.navigateByUrl('carrinho');
        }
        this.dados = JSON.parse(localStorage.getItem('venda'));
    }
}