<!-- FUNCION MARCAR TODOS LOS CHECKBOX -->

function seleccionar_todo(){ 
   for (i=0;i<document.enviar_mensajes.elements.length;i++) 
      if(document.enviar_mensajes.elements[i].type == "checkbox")	
         document.enviar_mensajes.elements[i].checked=1 
} // JavaScript Document


<!-- FUNCION MARCAR TODOS LOS CHECKBOX -->

function desseleccionar_todo(){ 
   for (i=0;i<document.enviar_mensajes.elements.length;i++) 
      if(document.enviar_mensajes.elements[i].type == "checkbox")	
         document.enviar_mensajes.elements[i].checked=0 
} // JavaScript Document




<!-- FUNCION IMPRIMIR PANTALLA
function printContents(idRef) { 
var elem=document.getElementById(idRef); 
if (!elem) { 
alert('El elemento indicado no existe.'); 
return false; 
} 
var html='<html><head><\/head><body onload="focus();print()">'; 
html+=elem.innerHTML; 
html+='<\/body><\/html>'; 
document.write(html); 
document.close(); 
} 