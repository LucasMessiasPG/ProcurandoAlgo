import {Component} from "angular2/core";
import {ProdutoService} from "../../services/produto";
@Component({
    selector: "produto-lista",
    templateUrl: "./app/components/produto-lista/lista.html"
})

export class ProdutoListaComponent {

    public produtos = [];

    constructor(produtoService: ProdutoService) {
        produtoService.get().subscribe(
            data => this.produtos = data.array
        );
    }
}