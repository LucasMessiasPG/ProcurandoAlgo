import {Component} from "angular2/core";
import {Headers, Http} from "angular2/http";

declare var $:any;

@Component({
    templateUrl: '../app/components/historico/historico.html'
})

export class HistoricoComponent {
    
    private pedidos = [];
    
    constructor(http: Http) {
        var headers = new Headers();

        headers.append('Content-Type', 'application/x-www-form-urlencoded');

        let user = JSON.parse(localStorage.getItem('user'));

        http.post("http://localhost:8000/pedido-produto/filter", $.param({
            id_usuario: user.id_usuario
        }),{headers:headers})
            .map(res => res.json())
            .subscribe(data => {
                this.pedidos = data.filtro;
            });
    }
    
}