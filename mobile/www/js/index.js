
var app = {
	clave_cifrar: 'E+1hqSP@BJ',
	url_server: 'http://localhost/preguntas_academicas/web/',
	hash_session: null,
	sig_codigo: null,
	clave_verificacion: null,
	// Constructor de la aplicacion
	initialize: function() {
		$('#clave_cifrar').val('clave_cifrar:' + app.clave_cifrar);
		$('#login_btn').click(function() {
			app.login();
		});
		$('#sig_codigo_btn').click(function() {
			app.optener_sig_codigo();
		});
	},
	login: function() {
		var usernameCifrado = md5($('#username').val());
		var passwordCifrado = md5($('#password').val());
		$.ajax({
			"type": "POST", 
			"url": app.url_server + "/clientes/login", 
			"data": {username:usernameCifrado, password: passwordCifrado}, 
			"success": function(data) {
				app.hash_session = data;
				$('#username').val(app.hash_session);
			}
		});
	},
	optener_sig_codigo: function() {
		//1. realizar un ajax, con metodo post(type) 
		//2. a la url: app.url_server + "/clientes/generar_rodante", 
		//3. datos: hash_session
		//4. guardar en app.sig_codigo
		
		//5. finalmente obtener clave_verificacion
	}
};

function dosDigitos(num) {
	if (num<10) {
		return '0' + num;
	}
	return num;
}
