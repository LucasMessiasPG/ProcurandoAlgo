import {Component} from "angular2/core";
import {RouteParams} from "angular2/router";
import {ProdutoListaComponent} from "../produto-lista/produto-lista";

@Component({
    templateUrl: "./app/components/departamento/departamento.html",
    directives: [ProdutoListaComponent]
})

export class DepartamentoComponent {

    public id_departamento;

    public filtro;

    constructor(private routeParams: RouteParams){
        this.id_departamento = routeParams.get('id_departamento');

        this.filtro = {
            id_departamento: routeParams.get('id_departamento')
        };
    }

}