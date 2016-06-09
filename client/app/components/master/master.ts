import {Component} from "angular2/core";
import {RouteConfig, ROUTER_DIRECTIVES, Router} from "angular2/router";
import {HomeComponent} from "../home/home";
import {DepartamentoComponent} from "../departamento/departamento";
import {enableProdMode} from "angular2/core";
import {BuscaComponent} from "../busca/busca";
import {CarrinhoComponent} from "../carrinho/carrinho";
import {DetalhesComponent} from "../detalhes/detalhes";
import {FinalizarComponent} from "../finalizar/finalizar";
import {LoginComponent} from "../login/login";
import {UsuarioService} from "../../services/usuario";
import {DepartamentoService} from "../../services/depatamento.service";
import {ToastListComponent} from "../toast/toast-list.component";
import {HistoricoComponent} from "../historico/historico";
import {ListaClienteComponent} from "../lista_cliente/lista_cliente";
import {LoginAdminComponent} from "../login_admin/login_admin";
import {ClienteService} from "../../services/cliente";

//Aplicação em Produção
enableProdMode();

@Component({
    selector: "procurandoalgo",
    templateUrl: "./app/components/master/master.html",
    directives: [
        ROUTER_DIRECTIVES,
        ToastListComponent
    ]
})

@RouteConfig([
    {path: "/", name: "Home", component: HomeComponent},
    {path: "/login", name: "Login", component: LoginComponent},
    {path: "/login_admin", name: "LoginAdmin", component: LoginAdminComponent},
    {path: "/departamento/:id_departamento", name: "Departamento", component: DepartamentoComponent},
    {path: "/busca/:texto", name: "Busca", component: BuscaComponent},
    {path: "/carrinho", name:"Carrinho", component: CarrinhoComponent},
    {path: "/detalhes/:id_produto", name:"Detalhes", component: DetalhesComponent},
    {path: "/compra-efetuada", name:"Finalizar", component: FinalizarComponent},
    {path: "/historico", name:"Historico", component: HistoricoComponent},
    {path: "/clientes", name:"ListaCliente", component: ListaClienteComponent},
])

export class MasterComponent {

    public user;

    public departamentos = [];

    constructor(private router: Router,private _clienteService: ClienteService,private _usuarioService: UsuarioService, private departamentoService: DepartamentoService) {
        this.router = router;
        if(this._usuarioService.getUser() != null) {
            this.user = this._usuarioService.getUser();
        }

        if(this._clienteService.getUser() != null) {
            this.user = this._clienteService.getUser();
        }

        this.departamentoService.all().subscribe(res => this.departamentos = res.filtro);
    }

    ngOnInit(){
        this._usuarioService.user$.subscribe(user => this.user = user)
        this._clienteService.user$.subscribe(user => this.user = user)
    }

    public buscar(event, texto) {
        event.preventDefault();
        this.router.navigateByUrl("busca/" + texto);
    }

    logout(){
        this._usuarioService.logout()
        this._clienteService.logout()
        this.user = null
        this.router.navigateByUrl('/')
    }

}