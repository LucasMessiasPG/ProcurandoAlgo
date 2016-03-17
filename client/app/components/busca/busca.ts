import {Component} from "angular2/core";
import {RouteParams} from "angular2/router";
import {ProdutoService} from "../../services/Produto";
import {ProdutoListaComponent} from "../produto-lista/produto-lista";

@Component({
    templateUrl: "./app/components/busca/busca.html",
    directives: [ProdutoListaComponent]
})

export class BuscaComponent {

    public tipo = {
        texto: null
    };

    constructor(private routeParams: RouteParams) {
        this.tipo.texto = routeParams.get('texto');
    }

}