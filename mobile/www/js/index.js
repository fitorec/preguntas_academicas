var app = {
	// Constructor de la aplicacion
	initialize: function() {
		$('#convertir-btn').click(function() {
			app.convertirMD5();
		});
	},
	/**
	 * Este metodo se encarga de actualizar la vista cada 30segundos
	 * 
	 *  - Activa la fila con clase Actual
	 *  - Actualiza el reloj
	 */
	convertirMD5: function() {
		var str = $('#convertir').val();
		 $('#resultado')
			.val(md5(str))
			.fadeIn();
	}
};

function dosDigitos(num) {
	if (num<10) {
		return '0' + num;
	}
	return num;
}
