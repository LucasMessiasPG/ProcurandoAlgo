app.factory('$app_factory', function (departamento_factory) {
	return {
		api: {
			departamento: departamento_factory
		}
	};
});