app.config(function($routeProvider, $locationProvider) {
	$routeProvider
		.when('/', {
			templateUrl: 'templates/index.html'
		})

		.when('/busca/:texto', {
			templateUrl: 'templates/busca.html',
			controller: 'BuscaCtrl'
		})
});