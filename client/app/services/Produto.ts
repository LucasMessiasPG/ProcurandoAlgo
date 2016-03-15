import {Injectable} from "angular2/core";
import {Http} from "angular2/http";
@Injectable()
export class ProdutoService {

    public produtos = [];
    private url = "http://192.168.1.170:8000/api/pessoa";

    constructor(public http: Http) {

    }

    public get() {
        return this.http.get(this.url).map(
            res => res.json()
        );
    }

    public filter(filter) {
        return this.http.post(this.url+'/filter',filter).map(
            res => res.json()
        );
    }

}