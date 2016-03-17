import {Component} from "angular2/core";
import {RouteConfig, ROUTER_DIRECTIVES, Router} from "angular2/router";
import {HomeComponent} from "../home/home";
import {DepartamentoComponent} from "../departamento/departamento";
import {enableProdMode} from "angular2/core";
import {BuscaComponent} from "../busca/busca";
import {PesquisaComponent} from "../pesquisa/pesquisa";

//Aplicação em Produção
enableProdMode();

@Component({
    selector: "procurandoalgo",
    templateUrl: "./app/components/master/master.html",
    directives: [
        ROUTER_DIRECTIVES
    ]
})

@RouteConfig([
    {path: "/", name: "Home", component: HomeComponent},
    {path: "/pesquisa/:pesquisa", name:'Pesquisa', component: PesquisaComponent},
    {path: "/departamento/:id_departamento", name: "Departamento", component: DepartamentoComponent},
    {path: "/busca/:texto", name: "Busca", component: BuscaComponent}
])

export class MasterComponent {

    public route;

    public departamentos = [
        {
            id_departamento: 1,
            nome: 'Informática'
        },
        {
            id_departamento: 2,
            nome: 'Celulares'
        },
        {
            id_departamento: 3,
            nome: 'Instrumetos Músicais'
        }
    ];

    constructor(router: Router) {
        this.route = router;
    }

    public buscar(evento, texto) {
        event.preventDefault();

        console.log(this.route.path);
    }



}