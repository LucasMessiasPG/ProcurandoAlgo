import {Component} from "angular2/core";
declare var $:any;

@Component({
    templateUrl: "./app/components/carrinho/carrinho.html"
})

export class CarrinhoComponent {

    public produtos = [
        {
            nome: 'produto1',
            valor: 200,
            quantidade: 1
        },
        {
            nome: 'produto2',
            valor: 200,
            quantidade: 1
        }
    ];

    public bandeiras = [
        {
            nome: 'VISA'
        },
        {
            nome: 'MASTERCARD'
        }
    ];

    public total(calc_quantidade) {
        var total = 0;

        $.each(this.produtos, function (i, produto) {
            total += produto.valor * (calc_quantidade ? produto.quantidade : 1);
        });

        return total;
    }
}