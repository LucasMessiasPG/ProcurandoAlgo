import {Component} from "angular2/core";
import {Headers, Http} from "angular2/http";
import {UsuarioService} from "../../services/usuario";
import {Router} from "angular2/router";
import {ValorPipe} from "../../pipe/valor";

declare var $:any;

@Component({
    templateUrl: '../app/components/historico/historico.html',
    pipes:[ValorPipe]
})

export class HistoricoComponent {
    
    private pedidos = [];
    
    constructor(http: Http, private _user:UsuarioService,private router: Router) {
        var user:any = _user.getUser();
        if(user == null){
            router.navigateByUrl('/')
            return ;
        }
        var headers = new Headers();

        headers.append('Content-Type', 'application/x-www-form-urlencoded');


        http.post("http://localhost:8000/pedido-produto/filter", $.param({
            id_cliente: user.id_cliente
        }),{headers:headers})
            .map(res => res.json())
            .subscribe(data => {
                this.pedidos = data.filtro;
            });
    }
    
}