import {Component} from "angular2/core";
import {ProdutoService} from "../../services/produto";
import {Input} from "angular2/core";
import {ROUTER_DIRECTIVES} from "angular2/router";
import {Router} from "angular2/router";
import {TruncatePipe} from "../../pipe/truncate";
import {ValorPipe} from "../../pipe/valor";

@Component({
    selector: "produto-lista",
    templateUrl: "./app/components/produto-lista/produto-lista.html",
    pipes:[TruncatePipe,ValorPipe],
    directives:[ROUTER_DIRECTIVES],
    inputs: ['query','filtro']
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
            data => this.set(data)
        );
    }

    set(data){
        if(data){
            this.produtos = data;
        }
    }

    addCarrinho(produto){
        var temp = localStorage.getItem('produto');
        produto.quantidade = 1;
        var check = true;
        if(temp){
            temp = JSON.parse(temp)
            for(var p in temp){
                if(temp[p].nome == produto.nome){
                    check = false
                }
            }
            if(check) {
                temp.push(produto)
            }
        }else{
            temp = [];
            temp.push(produto)
        }
        localStorage.setItem('produto',JSON.stringify(temp));
        this.router.navigateByUrl('carrinho')
    }

    constructor(private produtoService: ProdutoService, private router: Router) {
    }


}