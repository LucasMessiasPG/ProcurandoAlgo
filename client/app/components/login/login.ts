import {Component} from "angular2/core";
import {UsuarioService} from "../../services/usuario";
@Component({
    templateUrl:'../app/components/login/login.html'
})
export class LoginComponent{

    private errors = [];

    constructor(private _usuarioServicce: UsuarioService){}

    register(user){
        this.errors = [];
        if(!user.nome){
            this.errors.push({error: 'Nome não foi preenchido'})
        }else{
          if(user.nome.length <= 3 || user.nome.length >= 10){
            this.errors.push({error: 'Nome deve conter entre 3 a 10 caracteres'})
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
            this._usuarioServicce.create(user).subscribe((response) => {
                console.log(response);
            });
        }
    }
}