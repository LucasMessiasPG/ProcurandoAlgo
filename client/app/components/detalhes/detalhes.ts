import {Component} from "angular2/core";
import {RouteParams} from "angular2/router";
import {ProdutoService} from "../../services/Produto";

@Component({
    templateUrl:'../app/components/detalhes/detalhes.html',
    providers:[ProdutoService]
})
export class DetalhesComponent{

    public produto;
    public filtro;
    public tab;

    constructor(private routeParams: RouteParams, private produtoService: ProdutoService){
        this.tab = 'descricao'
        this.filtro = {
            id_produto: routeParams.get('id_produto')
        };

        this.produtoService.query('produto').filter(this.filtro).exec().subscribe(
            data => this.set(data)
        );

    }

    set(produto){
        this.produto = produto[0];
        this.produto.link = 'http://localhost:8000/asset/img/'+this.produto.id_produto+'/1'
    }

    menu(menu){
        this.tab = menu
    }
}