import {Component} from "angular2/core";
import {ProdutoService} from "../../services/produto";
import {Input} from "angular2/core";


@Component({
    selector: "produto-lista",
    templateUrl: "./app/components/produto-lista/lista.html",
    inputs: ['tipo']
})

export class ProdutoListaComponent {

    public lista;
    @Input set tipo(obj){
        this.lista = obj;
    };

    constructor(private produtoService: ProdutoService) {
    }

    public get(filter){
        console.log(filter);
        this.produtoService.get().subscribe(
            data => this.lista.produtos = data.array
        );
    }

}