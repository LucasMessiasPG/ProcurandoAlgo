import {Injectable} from "angular2/core";
import {Http} from "angular2/http";
import {Headers} from "angular2/http";
declare var $:any;

@Injectable()
export class ProdutoService {

    public produtos = [];
    private url = "http://localhost:8000/api/pessoa";

    constructor(public http: Http) {

    }

    public get() {
        return this.http.get(this.url).map(
            res => res.json()
        );
    }



    public filter(filter) {

        var headers = new Headers();
        headers.append('Content-Type', 'application/x-www-form-urlencoded');

        return this.http.post(this.url, $.param(filter),{headers:headers}).map(
            res => res.json()
        );
    }

}