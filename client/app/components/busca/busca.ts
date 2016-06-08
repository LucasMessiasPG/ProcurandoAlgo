import {Component} from "angular2/core";
import {RouteParams} from "angular2/router";
import {ProdutoService} from "../../services/produto";
import {ProdutoListaComponent} from "../produto-lista/produto-lista";

@Component({
    templateUrl: "./app/components/busca/busca.html",
    directives: [ProdutoListaComponent]
})

export class BuscaComponent {

    public filtro;

    constructor(private routeParams: RouteParams) {
        this.filtro = {
            texto: routeParams.get('texto')
        };
    }

}