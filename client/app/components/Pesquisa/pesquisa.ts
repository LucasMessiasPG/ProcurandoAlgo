import {Component} from "angular2/core";
import {ProdutoListaComponent} from "../produto-lista/produto-lista";
import {RouteParams} from "angular2/router";

@Component({
    templateUrl: "./app/components/pesquisa/pesquisa.html",
    directives:[ProdutoListaComponent]
})

export class PesquisaComponent {

    public destaque_obj;
    private pesquisa;
    constructor(private routeParams: RouteParams){
        this.pesquisa = routeParams.get('pesquisa');
        console.log(this.pesquisa);
        this.destaque_obj = {id:2};
    }


}