import {Component} from "angular2/core";
import {ProdutoService} from "../../services/produto";
import {Input} from "angular2/core";

@Component({
    selector: "produto-lista",
    templateUrl: "./app/components/produto-lista/lista.html",
    inputs: ['filtro']
})

export class ProdutoListaComponent {

    public produtos;
    @Input set filtro(obj){
        this.filter(obj);
    };

    constructor(private produtoService: ProdutoService) {
    }

    public filter(filter){
        this.produtoService.filter(filter).subscribe(
            data => this.produtos = data
        );
    }


}