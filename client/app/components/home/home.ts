import {Component} from "angular2/core";
import {ProdutoListaComponent} from "../produto-lista/produto-lista";

@Component({
    templateUrl: "./app/components/home/home.html",
    directives:[ProdutoListaComponent]
})

export class HomeComponent {

    public destaque_filter;

    public promocao_filter;

    constructor() {
        this.destaque_filter = {
            tipo: "destaque"
        };

        this.promocao_filter = {
            tipo: "promocao"
        };
    }
}