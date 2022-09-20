<?
echo 'function despMenu(nombre, sn){
obj = document.getElementById(nombre);
if (sn != 0)
     obj.style.visibility="visible";
else
     obj.style.visibility="hidden";
}'; 

if ($priv) {

echo 'function posicionTop() { 

    document.getElementById("itMenu1").style.top=document.getElementById("usuario").offsetTop+25;
	document.getElementById("itMenu1").style.left=document.getElementById("usuario").offsetLeft+5;
	
	
	
	document.getElementById("itMenu2").style.top=document.getElementById("tienda").offsetTop+25;
	document.getElementById("itMenu2").style.left=document.getElementById("tienda").offsetLeft; 
		
	document.getElementById("itMenu21").style.top=document.getElementById("articulos").offsetTop+66;
	document.getElementById("itMenu21").style.left=document.getElementById("articulos").offsetLeft+192; 

	
	document.getElementById("itMenu22").style.top=document.getElementById("categorias").offsetTop+66;
	document.getElementById("itMenu22").style.left=document.getElementById("categorias").offsetLeft+192;
	
	document.getElementById("itMenu23").style.top=document.getElementById("subcategorias").offsetTop+66;
	document.getElementById("itMenu23").style.left=document.getElementById("subcategorias").offsetLeft+192;
	
	document.getElementById("itMenu24").style.top=document.getElementById("colores").offsetTop+66;
	document.getElementById("itMenu24").style.left=document.getElementById("colores").offsetLeft+192;
	
	document.getElementById("itMenu25").style.top=document.getElementById("tipos").offsetTop+66;
	document.getElementById("itMenu25").style.left=document.getElementById("tipos").offsetLeft+192;	
	
	
	document.getElementById("itMenu3").style.top=document.getElementById("asociados").offsetTop+25;			
	document.getElementById("itMenu3").style.left=document.getElementById("asociados").offsetLeft+5;

	document.getElementById("itMenu4").style.top=document.getElementById("imagenes").offsetTop+25;	
	document.getElementById("itMenu4").style.left=document.getElementById("imagenes").offsetLeft+5;
	
	document.getElementById("itMenu5").style.top=document.getElementById("presupuestos").offsetTop+25;	
	document.getElementById("itMenu5").style.left=document.getElementById("presupuestos").offsetLeft+5;

	
	
	document.getElementById("itMenu8").style.top=document.getElementById("gestion").offsetTop+25;
	document.getElementById("itMenu8").style.left=document.getElementById("gestion").offsetLeft+5;
	
	}'; } else {

echo 'function posicionTop() { 

	document.getElementById("itMenu2").style.top=document.getElementById("tienda").offsetTop+25;
	document.getElementById("itMenu2").style.left=document.getElementById("tienda").offsetLeft; 
		
	document.getElementById("itMenu21").style.top=document.getElementById("articulos").offsetTop+66;
	document.getElementById("itMenu21").style.left=document.getElementById("articulos").offsetLeft+192; 

	
	document.getElementById("itMenu22").style.top=document.getElementById("categorias").offsetTop+66;
	document.getElementById("itMenu22").style.left=document.getElementById("categorias").offsetLeft+192;
	
	document.getElementById("itMenu23").style.top=document.getElementById("subcategorias").offsetTop+66;
	document.getElementById("itMenu23").style.left=document.getElementById("subcategorias").offsetLeft+192;	
document.getElementById("itMenu24").style.top=document.getElementById("colores").offsetTop+66;	document.getElementById("itMenu24").style.left=document.getElementById("colores").offsetLeft+192;	
document.getElementById("itMenu25").style.top=document.getElementById("tipos").offsetTop+66;	document.getElementById("itMenu25").style.left=document.getElementById("tipos").offsetLeft+192;
	
	document.getElementById("itMenu3").style.top=document.getElementById("asociados").offsetTop+25;	
	document.getElementById("itMenu3").style.left=document.getElementById("asociados").offsetLeft+5;

	document.getElementById("itMenu4").style.top=document.getElementById("imagenes").offsetTop+25;	
	document.getElementById("itMenu4").style.left=document.getElementById("imagenes").offsetLeft+5;	
	
	document.getElementById("itMenu5").style.top=document.getElementById("presupuestos").offsetTop+25;	
	document.getElementById("itMenu5").style.left=document.getElementById("presupuestos").offsetLeft+5	
	
	document.getElementById("itMenu8").style.top=document.getElementById("gestion").offsetTop+25;
	document.getElementById("itMenu8").style.left=document.getElementById("gestion").offsetLeft+5;
	
}'; }

?>
