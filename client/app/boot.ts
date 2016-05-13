import {bootstrap}    from 'angular2/platform/browser'
import {MasterComponent} from "./components/master/master";
import {ROUTER_PROVIDERS} from "angular2/router";
import {HTTP_PROVIDERS} from "angular2/http";
import {ProdutoService} from "./services/produto";
import {provide} from "angular2/core";
import {HashLocationStrategy} from "angular2/router";
import 'rxjs/add/operator/map';
import {ComentarioService} from "./services/comentario";
import {UsuarioService} from "./services/usuario";

bootstrap(MasterComponent, [
    ROUTER_PROVIDERS,
    HTTP_PROVIDERS,
    ProdutoService,
    ComentarioService,
    UsuarioService
]);