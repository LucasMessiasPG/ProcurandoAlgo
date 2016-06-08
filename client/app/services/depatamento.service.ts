import {Injectable} from "angular2/core";
import {Http} from "angular2/http";
import {Headers} from "angular2/http";
declare var $;

@Injectable()
export class DepartamentoService{
    private _departamentos = null;
    private _url = 'http://localhost:8000/departamento'

    constructor(private _http: Http){}

    all(){
        var header = new Headers    ();
        header.append('Content-type','application/x-www-form-urlencoded')
        return this._http.post(this._url).map(res => res.json())
}
}