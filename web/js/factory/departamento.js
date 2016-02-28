app.factory('departamento_factory', function ($http) {
	var url = 'http://192.168.1.27:8000/';

	return {
		filter: function (params, callback) {
			if(params) {
				$http.post(url + 'departamento', params, {
					headers: {
						"Access-Control-Allow-Headers": "*"
					}
				}).then(function (response) {
					callback(response.data);
				});
			}
		}
	};
});
