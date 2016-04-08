import {Component} from "angular2/core";
import {RouteParams} from "angular2/router";
import {ProdutoService} from "../../services/Produto";
import {ROUTER_DIRECTIVES} from "angular2/router";
import {Router} from "angular2/router";
declare var $:any;

@Component({
    templateUrl: "./app/components/carrinho/carrinho.html",
    directives:[ROUTER_DIRECTIVES],
    providers:[ProdutoService]
})

export class CarrinhoComponent {

    public produtos = [];

    public parcelas = [2,3,4,5,6,7,8,9,10,11,12];

    public bandeiras = [
        {
            nome: 'VISA'
        },
        {
            nome: 'MASTERCARD'
        }
    ];

    constructor(private routeParams: RouteParams, private produtoService: ProdutoService,private router: Router){
        if(localStorage.getItem('produto') == null){
            localStorage.setItem('produto',JSON.stringify([]))
        }
        this.produtos = JSON.parse(localStorage.getItem('produto'));
    }

    public total(calc_quantidade) {
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
}