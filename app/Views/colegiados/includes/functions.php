<?php
	function proximo_registro ($bd_base,$tabla) {	 
	 $sql_prox="SHOW TABLE STATUS FROM ".$bd_base." LIKE '".$tabla."'";
	 $con=mysql_query($sql_prox) or die (mysql_error());
	 $res=mysql_fetch_array($con);
	 $num=$res[Auto_increment];
	 return $num;
	 }
	 
	 /********************************/
	 
	 function validar_tamano_imagen($imagen, $max_ancho, $max_alto) { 	 
	 
	 if(empty($_FILES[$image]["name"]))  {$error.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>Debe insertar todas las imagenes solicitadas.</font> \n <br>";}
	 
	 $extensiones = array("jpg");
	 $extension_archivo=explode(".", $_FILES[$imagen]["name"]);
	 if(!in_array($extension_archivo, $extensiones))  {$error.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>La imagen debe ser JPG</font> \n <br>";}	
	 
	  $img_info = getimagesize($_FILES[$imagen]["tmp_name"]); //
	  $ancho=$img_info[0];
	  $alto=$img_info[1]; 
	  if($ancho > $mas_ancho) {$error.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>El ancho de la imagen debe tener un máximo de ".$max_ancho." pixeles</font> \n <br>";}			
	  if($alto > $nax_alto) {$error.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial narrow, arial' size='2' color='red'>El alto de la imagen debe tener un máximo de ".$max_alto." pixeles</font> \n <br>";}			
	  return $error;
	 }
	 
	 /********************************/
	 
	 function subir_imagen($nombre_imagen, $directorio, $nuevo_nombre ) {
	 if(move_uploaded_file($_FILES[$nombre_imagen]['tmp_name'], $directorio.$_FILES[$nombre_imagen]['name'])) {		
		chmod($directorio.$_FILES[$nombre_imagen]["name"], 0777);  		
		rename( $directorio.$_FILES[$nombre_imagen]["name"], $directorio.$nuevo_nombre.".jpg"); 		
		return $subida=TRUE;
	  } else {
	    return $subida=FALSE;
	  }
			
	 }
	 
	 /*******************************/
	 
	 function formato_fecha_americano($fecha) {
  	    $fechas = explode("-",$fecha); 
		return $gfecha = $fechas[2]."-".$fechas[1]."-".$fechas[0];
	 }	 
?>
