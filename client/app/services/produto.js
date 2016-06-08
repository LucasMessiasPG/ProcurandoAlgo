System.register(["angular2/core", "angular2/http"], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, http_1, http_2;
    var ProdutoService;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (http_1_1) {
                http_1 = http_1_1;
                http_2 = http_1_1;
            }],
        execute: function() {
            ProdutoService = (function () {
                function ProdutoService(http) {
                    this.http = http;
                    this.produtos = [];
                    this.urlBase = "http://localhost:8000/";
                    this.url = "busca";
                    this._filter = {};
                }
                ProdutoService.prototype.get = function () {
                    return this.http.get(this.url).map(function (res) { return res.json(); });
                };
                ProdutoService.prototype.filter = function (filter) {
                    this._filter = filter;
                    this.exec();
                    return this;
                };
                ProdutoService.prototype.query = function (url) {
                    this._filter = {};
                    this.url = url;
                    return this;
                };
                ProdutoService.prototype.exec = function () {
                    var headers = new http_2.Headers();
                    headers.append('Content-Type', 'application/x-www-form-urlencoded');
                    return this.http.post(this.urlBase + this.url, $.param(this._filter), { headers: headers }).map(function (res) { return res.json(); });
                };
                ProdutoService = __decorate([
                    core_1.Injectable(), 
                    __metadata('design:paramtypes', [http_1.Http])
                ], ProdutoService);
                return ProdutoService;
            }());
            exports_1("ProdutoService", ProdutoService);
        }
    }
});
//# sourceMappingURL=produto.js.map