import {Injectable} from "angular2/core";
import {Http} from "angular2/http";
import {Headers} from "angular2/http";
declare var $:any;

@Injectable()
export class ProdutoService {

    public produtos = [];
    private urlBase = "http://192.168.1.170:8000/";
    private url = "busca";
    private _filter = {};

    constructor(public http: Http) {

    }

    public get() {
        return this.http.get(this.url).map(
            res => res.json()
        );
    }

    public filter(filter) {
        this._filter = filter;

        this.exec();
    }

    public query(url) {
        this.url = url;
    }

    public exec() {
        var headers = new Headers();

        headers.append('Content-Type', 'application/x-www-form-urlencoded');
        //headers.append('Authorization', 'Basic bWVzc2lhczoxMjM0NTY=')

        return this.http.post(this.urlBase + this.url, $.param(this._filter),{headers:headers}).map(
            res => res.json()
        );
    }
}