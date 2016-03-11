import {Component} from "angular2/core";
import {ProdutoListaComponent} from "../produto-lista/produto-lista";

@Component({
    templateUrl: "./app/components/home/home.html",
    directives:[ProdutoListaComponent]
})

export class HomeComponent {
    public produtos;
}