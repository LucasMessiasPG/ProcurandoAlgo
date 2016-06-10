import {Component} from "angular2/core";
import {Headers, Http} from "angular2/http";
import {ToastService} from "../toast/toast-list.service";

declare var $:any;

@Component({
    templateUrl: '../app/components/lista_cliente/lista_cliente.html'
})

export class ListaClienteComponent {

    private clientes = [];

    constructor(private http: Http, private _toast: ToastService) {
        var headers = new Headers();

        headers.append('Content-Type', 'application/x-www-form-urlencoded');

        let user = JSON.parse(localStorage.getItem('user'));

        http.post("http://localhost:8000/cliente/list", null,{headers:headers})
            .map(res => res.json())
            .subscribe(data => {
                this.clientes = data.clientes;
            });
    }
    
    enviarEmail(cliente) {
        var headers = new Headers();
        
        headers.append('Content-Type', 'application/x-www-form-urlencoded');

        var mensagem: string = prompt('Digite a mensagem de e-mail que irá enviar');

        this.http.post("http://localhost:8000/email", $.param({
            id_cliente: cliente.id_cliente,
            msg: mensagem
        }),{headers:headers})
            .map(res => res.json())
            .subscribe(data => {
                let toast = {message:'E-mail enviado com sucesso',type:'success'}
                this._toast.pop(toast);
            });
    }

}