function desconectarse() {
	formulario = document.createElement("form"); 
	formulario.setAttribute("method","post");
	formulario.setAttribute("hidden","");
	input = document.createElement("input"); 
	input.setAttribute("name","action");
	input.setAttribute("value","logout");
	formulario.appendChild(input);
	document.body.appendChild(formulario);
	formulario.submit();
}