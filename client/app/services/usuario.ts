import {Injectable} from "angular2/core";
import {Http} from "angular2/http";
import {Headers} from "angular2/http";
import {RequestOptions} from "angular2/http";
import {EventEmitter} from "angular2/core";
declare var $;

@Injectable()
export class UsuarioService{
    public usuarios = [];
    private user = null;
    private urlBase = "http://localhost:8000/";
    private _filter = {};
    public user$

    constructor(private http: Http){
        let user = localStorage.getItem('user')
        this.user = JSON.parse(user);
        this.user$ = new EventEmitter();
    }

    private serialize( obj ) {
        return Object.keys(obj).reduce(function(a,k){a.push(k+'='+encodeURIComponent(obj[k]));return a},[]).join('&')
    }

    public create(user){
        var header = new Headers();
        header.append('Content-type','application/x-www-form-urlencoded')
        return this.http.post(this.urlBase+'usuario/create', this.serialize(user),{headers:header}).map(res=>res.json());
    }

    login(user){
        var header = new Headers();
        header.append('Content-type','application/x-www-form-urlencoded')
        return this.http.post(this.urlBase+'login', this.serialize(user),{headers:header}).map(res=>res.json());
    }

    logout(){
        this.user = null;
        localStorage.removeItem('user');
    }

    setUser(user){
        this.user$.emit(user)
        localStorage.setItem('user',JSON.stringify(user))
        this.user = user;
    }

    getUser(){
        return this.user
    }
}

