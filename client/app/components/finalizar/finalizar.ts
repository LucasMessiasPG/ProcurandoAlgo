import {Component} from "angular2/core";
import {Router} from "angular2/router";
import {ROUTER_DIRECTIVES} from "angular2/router";
import {ValorPipe} from "../../pipe/valor";
@Component({
    templateUrl:'../app/components/finalizar/finalizar.html',
    directives:[ROUTER_DIRECTIVES],
    pipes:[ValorPipe]
})

export class FinalizarComponent{

    public dados;
    constructor(private route: Router){
        if(localStorage.getItem('pedido')){
            this.dados = JSON.parse(localStorage.getItem('pedido'));
            console.log(this.dados)
            localStorage.removeItem('pedido')
        }else{
            this.route.navigateByUrl('carrinho');
        }
    }
}