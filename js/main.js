
//Metodo para elegir un periodo

function cambiar_periodo(valor){

	if(valor != 'Selecciona una opcion'){

		location.href='Vista/principal.php?p=' + valor;
	}
}

//Metodos para elegir un curso

function cambiar_curso(valor1, valor2){

	if(valor1 != 'Selecciona una opcion' && valor2 != 'Selecciona una opcion'){

		location.href='../Vista/vista_nota.php?p=' + valor1 + '&c=' + valor2;
	}
}

function ver_informe(valor1, valor2){

	if(valor1 != 'Selecciona una opcion' && valor2 != 'Selecciona una opcion'){

		location.href='../Vista/vista_informe.php?p=' + valor1 + '&c=' + valor2;
	}
}
//Metodo para validar el curso

//metodo para contar el numero de caracteres del comentario
var contador=0;
function contar(){
	if(document.getElementById('caja').value.length <= 250){

		document.getElementById('caja').style.color = 'black';
		contador += 1;
		console.log(document.getElementById('caja').value.length);
	}else{
		//ARREGLAR ESTE ULTIMO PASO
		document.getElementById('caja').style.color = 'red';

	}
}
