import {Component} from "angular2/core";
import {ProdutoService} from "../../services/produto";
import {Input} from "angular2/core";

@Component({
    selector: "produto-lista",
    templateUrl: "./app/components/produto-lista/produto-lista.html",
    inputs: ['filtro', 'query']
})

export class ProdutoListaComponent {

    public produtos;
    @Input() set filtro(filter) {
        this.produtoService.filter(filter);
    };

    @Input() set query(query) {
        this.produtoService.query(query);
    }

    ngOnInit() {
        this.produtoService.exec().subscribe(
            data => this.produtos = data
        );
    }

    constructor(private produtoService: ProdutoService) {
    }


}