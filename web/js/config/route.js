app.config(function($routeProvider, $locationProvider) {
	$routeProvider
		.when('/', {
			templateUrl: 'templates/index.html',
			controller: 'IndexCtrl'
		})

		.when('/busca/:texto', {
			templateUrl: 'templates/busca.html',
			controller: 'BuscaCtrl'
		})

		.when('/minha_conta', {
			templateUrl: 'templates/minha_conta.html',
			controller: 'ContaCtrl'
		})

		.when('/carrinho', {
			templateUrl: 'templates/carrinho.html',
			controller: 'CarrinhoCtrl'
		})
});