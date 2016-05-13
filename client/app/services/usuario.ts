import {Injectable} from "angular2/core";
import {Http} from "angular2/http";
import {Headers} from "angular2/http";
import {RequestOptions} from "angular2/http";
declare var $;

@Injectable()
export class UsuarioService{
    public usuarios = [];
    private urlBase = "http://localhost:8000/";
    private _filter = {};

    constructor(private http: Http){}

    private serialize( obj ) {
        return Object.keys(obj).reduce(function(a,k){a.push(k+'='+encodeURIComponent(obj[k]));return a},[]).join('&')
    }

    create(usuario){
        var header = new Headers();
        header.append('Content-type','application/x-www-form-urlencoded')
        return this.http.post(this.urlBase+'usuario/create', this.serialize(usuario),{headers:header}).map(res=>res.text());
    }
}

