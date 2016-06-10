import {Component} from "angular2/core";
import {RouteParams} from "angular2/router";
import {ProdutoService} from "../../services/produto";
import {Router} from "angular2/router";
import {ComentarioService} from "../../services/comentario";
import {ValorPipe} from "../../pipe/valor";
import {UsuarioService} from "../../services/usuario";

@Component({
    templateUrl:'../app/components/detalhes/detalhes.html',
    pipes:[ValorPipe],
    providers:[ProdutoService,ComentarioService]
})
export class DetalhesComponent{

    public produto;
    public comentarios;
    public filtro;
    public user;
    public tab;

    constructor(
        private routeParams: RouteParams,
        private produtoService: ProdutoService,
        private router: Router,
        private comentarioService: ComentarioService,
        private usuarioService:UsuarioService
    ){
        this.tab = 'descricao';
        this.user = usuarioService.getUser();
        this.filtro = {
            id_produto: routeParams.get('id_produto')
        };

        this.produtoService.query('produto').filter(this.filtro).exec().subscribe(
            data => this.set(data)
        );
        this.getComentarios()

    }

    getComentarios(){
            this.comentarioService.query('').filter({id_produto:this.routeParams.get('id_produto')}).exec().subscribe(
            data => {
                this.comentarios = data.filtro.reverse()

                for (var i in this.comentarios) {
                    var rating = [];

                    for (var nota = 0;nota < 5; nota++) {
                        if(nota < this.comentarios[i].rate)
                            rating.push({rate:true});
                        else
                            rating.push({rate:false});
                    }

                    this.comentarios[i].rating = rating;
                }

                return this.comentarios;
            }
        );
    }

    set(produto){
        if(produto.length > 0) {
            this.produto = produto[0];
            this.produto.link = 'http://localhost:8000/asset/img/' + this.produto.id_produto + '/1'
        }else{
            this.router.navigateByUrl('')
        }
    }

    menu(menu){
        this.tab = menu
    }

    comentar(form){
        form.id_produto = this.routeParams.get('id_produto');
        this.comentarioService.query('/create').filter(form).exec().subscribe(data => data);
        this.getComentarios()
    }

    addCarrinho(produto){
        var temp = localStorage.getItem('produto');
        produto.quantidade = 1;
        var check = true;
        if(temp){
            temp = JSON.parse(temp)
            for(var p in temp){
                if(p.indexOf(produto.nome) >= 0){
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
}