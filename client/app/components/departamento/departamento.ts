import {Component} from "angular2/core";
import {RouteParams} from "angular2/router";

@Component({
    templateUrl: "./app/components/departamento/departamento.html"
})

export class DepartamentoComponent {

    public id_departamento;

    constructor(private _routeParams: RouteParams){
        this.id_departamento = _routeParams.get('id_departamento');
    }




}