app.controller('MainCtrl', function ($scope, $rootScope, $location, $app_factory) {
	$rootScope.app = $app_factory;

	$scope.usuario = {
		nome: 'Jonas'
	};

	$scope.departamentos = [
		{
			id_departamento: 1,
			nome: 'Informática'
		},
		{
			id_departamento: 2,
			nome: 'Celulares'
		},
		{
			id_departamento: 3,
			nome: 'Instrumetos Músicais'
		}
	];

	//metodo para fazer uma busca
	$scope.href = function (link) {
		$location.path(link + '/' + arguments[1]);
	};
});

app.controller('BuscaCtrl', function ($rootScope, $routeParams) {
	$rootScope.app.api.departamento.filter($routeParams, function (response) {
		if(status == 'success') {
			$scope.produtos = response.filtro;
		}
	});
});