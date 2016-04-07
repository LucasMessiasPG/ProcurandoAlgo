import {Injectable} from "angular2/core";
import {Http} from "angular2/http";
import {Headers} from "angular2/http";
declare var $:any;

@Injectable()
export class ComentarioService {

    public comentario = [];
    private urlBase = "http://localhost:8000/comentario";
    private url = "";
    private _filter = {};

    constructor(public http: Http) {

    }

    public get() {
        return this.http.get(this.url).map(
            res => res.json()
        );
    }

    public filter(filter):ComentarioService {
        this._filter = filter;
        return this;
    }

    public query(url):ComentarioService {
        this._filter = {};
        this.url = url;
        return this;
    }

    public exec() {
        var headers = new Headers();

        headers.append('Content-Type', 'application/x-www-form-urlencoded');
        console.log(this.urlBase + this.url);
        return this.http.post(this.urlBase + this.url, $.param(this._filter),{headers:headers}).map(
            res => res.json()
        );

    }
}