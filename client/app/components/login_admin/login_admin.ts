import {Component} from "angular2/core";
import {UsuarioService} from "../../services/usuario";
import {Router, ROUTER_DIRECTIVES} from "angular2/router";
import {ToastService} from "../toast/toast-list.service";
@Component({
    templateUrl:'../app/components/login_admin/login_admin.html',
    directives:[ROUTER_DIRECTIVES],
})
export class LoginAdminComponent{

    private errors = [];

    constructor(private _usuarioService: UsuarioService,private _toast: ToastService,private _router: Router){
        if(this._usuarioService.getUser() != null) {
            this._router.navigateByUrl('/');
        }
    }

    login(user){
        if(!user.email){
            this.errors.push({error: 'Email não foi preenchido'})
        }
        if(!user.senha){
            this.errors.push({error: 'Senha não foi preenchido'})
        }
        if(this.errors.length == 0) {
            this._usuarioService.login(user).subscribe(res => this.setUser(res))
        }
    }
    setUser(response){
        let user = response.user
        if(user && user.nome && user.email) {
            this._toast.pop({message: 'Bem vindo ' + user.nome.toUpperCase(), type: 'success'})
            this._usuarioService.setUser(user)
            this._router.navigateByUrl('/');
        }else{
            this._toast.pop({message:response.msg,type:response.status})
        }
    }

    register(user){
        this.errors = [];
        if(!user.nome){
            this.errors.push({error: 'Nome não foi preenchido'})
        }else{
          if(user.nome.length <= 3 || user.nome.length >= 50){
            this.errors.push({error: 'Nome deve conter entre 3 a 50 caracteres'})
          }
        }

        if(!user.email){
            this.errors.push({error: 'Email não foi preenchido'})
        }

        if(!user.senha || !user.senha_confirmation){
            this.errors.push({error: 'Senha não foi preenchido'})
        }else {
            if (user.senha.length == 6) {
                if (user.senha != user.senha_confirmation) {
                    this.errors.push({error: 'Senha diferentes'})
                }
            } else {
                this.errors.push({error: 'Senha deve conter 6 caracteres'})
            }
        }

        if(this.errors.length == 0){
            this._usuarioService.create(user).subscribe((response) => {
                if(response.status == 'success') {
                    let toast = {message:'Registro Efetuado',type:'success'}
                    this._toast.pop(toast);

                    this._usuarioService.setUser(response.user);

                    user = {};

                    this._router.navigateByUrl('/');
                }
            });
        }
    }
}