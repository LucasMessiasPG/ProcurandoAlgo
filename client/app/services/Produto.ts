import {Injectable} from "angular2/core";
import {Http} from "angular2/http";
import {Headers} from "angular2/http";
declare var $:any;

@Injectable()
export class ProdutoService {

    public produtos = [];
    private urlBase = "http://localhost:8000/";
    private url = "busca";
    private _filter = {};

    constructor(public http: Http) {

    }

    public get() {
        return this.http.get(this.url).map(
            res => res.json()
        );
    }

    public filter(filter):ProdutoService {
        this._filter = filter;
        this.exec();
        return this;
    }

    public query(url):ProdutoService {
        this._filter = {};
        this.url = url;
        return this;
    }

    public exec() {
        var headers = new Headers();

        headers.append('Content-Type', 'application/x-www-form-urlencoded');

        return this.http.post(this.urlBase + this.url, $.param(this._filter),{headers:headers}).map(
            res => res.json()
        );

    }
}