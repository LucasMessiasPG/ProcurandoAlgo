import {Component} from "angular2/core";
import {RouteParams} from "angular2/router";
import {ProdutoService} from "../../services/produto";
import {ROUTER_DIRECTIVES} from "angular2/router";
import {Router} from "angular2/router";
import {ValorPipe} from "../../pipe/valor";
import {Http} from "angular2/http";
import {Headers} from "angular2/http";
import {ToastService} from "../toast/toast-list.service";
declare var $:any;

@Component({
    templateUrl: "./app/components/carrinho/carrinho.html",
    directives:[ROUTER_DIRECTIVES],
    providers:[ProdutoService],
    pipes:[ValorPipe]
})

export class CarrinhoComponent {

    public produtos = [];
    public pagamento = {};

    public http;

    public parcelas = [2,3,4,5,6,7,8,9,10,11,12];

    public bandeiras = [
        {
            nome: 'VISA'
        },
        {
            nome: 'MASTERCARD'
        }
    ];

    constructor(private routeParams: RouteParams, private produtoService: ProdutoService,private router: Router,_http:Http,private _toast: ToastService){
        if(localStorage.getItem('produto') == null){
            localStorage.setItem('produto',JSON.stringify([]))
        }
        this.produtos = JSON.parse(localStorage.getItem('produto'));
        this.http = _http
    }

    total(calc_quantidade) {
        var total = 0;
        $.each(this.produtos, function (i, produto) {
            total += produto.valor_unitario * (calc_quantidade ? produto.quantidade : 1);
        });

        return total;
    }

    remove(produto){
        this.produtos.splice(this.produtos.indexOf(produto),1);
        localStorage.setItem('produto',JSON.stringify(this.produtos));
    }

    onChange(newValue,produto) {
        this.produtos[this.produtos.indexOf(produto)].quantidade = newValue.target.value;
    }

    finalizar(form){
        localStorage.setItem('venda',JSON.stringify(form))
        this.router.navigateByUrl('compra-efetuada')
    }

    selectCartao(value){
        console.log(value);
    }

    enviar(pagamento){

        var post = {
            'valor':this.total(true).toFixed(2),
            'parcelas':pagamento.parcelas,
            'nome_cartao':pagamento.nome_cartao,
            'num_cartao':pagamento.num_cartao,
            'cvc':pagamento.cvc,
            'mes_cartao':pagamento.mes_cartao,
            'ano_cartao':pagamento.ano_cartao
        };

        var headers = new Headers();

        headers.append('Content-Type', 'application/x-www-form-urlencoded');

        this.http.post('http://localhost:8000/transaction', $.param(post),{headers:headers})
            .map(res => res.json())
            .subscribe(data => this.showResult(data))


    }

    private showResult(data):any {
        var msg = {
            type: data.status,
            message: data.msg
        }
        if(data.pedido.id_pedido){
            this.http.post('Http://localhost:8000/pedido-produto/create',$param(psot),{headers:headers})
        }
        this._toast.pop(msg)
        if(msg.type == 'success') {
            localStorage.removeItem('produto')
            localStorage.setItem('pedido',JSON.stringify(data.json))
            this.produtos = []
            this.router.navigateByUrl('compra-efetuada')
        }

    }
}