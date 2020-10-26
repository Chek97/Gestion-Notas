
//Metodo para elegir un periodo

function cambiar_periodo(valor){

	if(valor != 'Selecciona una opcion'){

		location.href='Vista/principal.php?p=' + valor;
	}
}

//Metodos para elegir un curso

function cambiar_curso(valor1, valor2){

	if(valor1 != 'Selecciona una opcion' && valor2 != 'Selecciona una opcion'){

		location.href='../Notes/studentsNote.php?p=' + valor1 + '&c=' + valor2;
	}
}

function ver_informe(valor1, valor2){

	if(valor1 != 'Selecciona una opcion' && valor2 != 'Selecciona una opcion'){

		location.href='../Reports/indexReports.php?p=' + valor1 + '&c=' + valor2;
	}
}

// CHART JS

