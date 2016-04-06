import {Component} from "angular2/core";
import {ProdutoService} from "../../services/produto";
import {Input} from "angular2/core";
import {ROUTER_DIRECTIVES} from "angular2/router";

@Component({
    selector: "produto-lista",
    templateUrl: "./app/components/produto-lista/produto-lista.html",
    directives:[ROUTER_DIRECTIVES],
    inputs: ['query','filtro']
})

export class ProdutoListaComponent {

    public produtos;

    @Input() set filtro(filter) {
        console.log(1);
        this.produtoService.filter(filter);
    };

    @Input() set query(query) {
        console.log(2);
        this.produtoService.query(query);
    }

    ngOnInit() {
        this.produtoService.exec().subscribe(
            data => this.set(data)
        );
    }

    set(data){
        if(data){
            this.produtos = data;
        }
    }

    constructor(private produtoService: ProdutoService) {
    }


}