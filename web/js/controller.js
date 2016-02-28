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

	$scope.carrinho_produtos = [
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		}
	];

	//metodo para fazer uma busca
	$scope.href = function (link) {
		var params = arguments[1] ? arguments[1] : '';

		$location.path(link + '/' + params);
	};
});

app.controller('IndexCtrl', function ($scope) {
	$scope.produtos = [
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		}
	];
});

app.controller('BuscaCtrl', function ($scope, $rootScope, $routeParams) {
	$scope.palavra_pesquisada = $routeParams.texto;

	$scope.produtos = [
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		},
		{
			nome: 'produto',
			valor: 200,
			img: ''
		}
	];

	$rootScope.app.api.departamento.filter($routeParams, function (response) {
		if(status == 'success') {
			$scope.produtos = response.filtro;
		}
	});
});

app.controller('ContaCtr', function ($scope) {

});

app.controller('CarrinhoCtrl', function ($scope) {
	$scope.produtos = [
		{
			nome: 'produto',
			valor: 200,
			quantidade: 1
		},
		{
			nome: 'produto',
			valor: 200,
			quantidade: 1
		}
	];

	$scope.total = function (calc_quantidade) {
		var total = 0;

		$.each($scope.produtos, function (i, produto) {
			total += produto.valor * (calc_quantidade ? produto.quantidade : 1);
		});

		return total;
	};

	$scope.bandeiras = [
		{
			nome: 'VISA'
		},
		{
			nome: 'MASTERCARD'
		}
	];
});