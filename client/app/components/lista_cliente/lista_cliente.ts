import {Component} from "angular2/core";
import {Headers, Http} from "angular2/http";

declare var $:any;

@Component({
    templateUrl: '../app/components/lista_cliente/lista_cliente.html'
})

export class ListaClienteComponent {

    private clientes = [];

    constructor(private http: Http) {
        var headers = new Headers();

        headers.append('Content-Type', 'application/x-www-form-urlencoded');

        let user = JSON.parse(localStorage.getItem('user'));

        http.post("http://localhost:8000/cliente/list", null,{headers:headers})
            .map(res => res.json())
            .subscribe(data => {
                this.clientes = data.clientes;
            });
    }
    
    enviarEmail(cliente) {console.log(cliente);
        var headers = new Headers();
        
        headers.append('Content-Type', 'application/x-www-form-urlencoded');
        
        this.http.post("http://localhost:8000/email", $.param({
            id_cliente: cliente.id_cliente,
            msg: 'text...'
        }),{headers:headers})
            .map(res => res.json())
            .subscribe();
    }

}