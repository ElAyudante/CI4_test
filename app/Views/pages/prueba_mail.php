<?php 
 error_reporting(E_ALL);
 ini_set("display_errors", 1);
/*
if(function_exists('mail')){ 
echo "existe la función mail"; 
}else{ 
echo "no existe la función mail"; 
} 
*/
$mensaje= "hola"; 
			
				// primero hay que incluir la clase phpmailer para poder instanciar
				//un objeto de la misma
				require_once "phpmailer/class.phpmailer.php";			
				
						
				  //instanciamos un objeto de la clase phpmailer al que llamamos 
				  //por ejemplo mail
				  $mail = new phpmailer();
				
				  //Definimos las propiedades y llamamos a los mtodos 
				  //correspondientes del objeto mail
				
				  //Con PluginDir le indicamos a la clase phpmailer donde se 
				  //encuentra la clase smtp que como he comentado al principio de 
				  //este ejemplo va a estar en el subdirectorio includes
				  $mail->PluginDir = "phpmailer/";
				
				  //Con la propiedad Mailer le indicamos que vamos a usar un 
				  //servidor smtp
				  $mail->Mailer = "mail";
				
				  //Asignamos a Host el nombre de nuestro servidor smtp
				  $mail->Host = "mail.logopedascantabria.org";
				
				  //Le indicamos que el servidor smtp requiere autenticacin
				  $mail->SMTPAuth = false;
				
				  //Le decimos cual es nuestro nombre de usuario y password
				  $mail->Username = "colegio@logopedascantabria.org"; 
				  $mail->Password = "12345";
				
				  //Indicamos cual es nuestra direccin de correo y el nombre que 
				  //queremos que vea el usuario que lee nuestro correo
				  $mail->From = "colegio@logopedascantabria.org";
				  $mail->FromName = "COLEGIO PROFESIONAL DE LOGOPEDAS DE CANTABRIA";
				
				  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar 
				  //una cuenta gratuita, por tanto lo pongo a 120  
				  $mail->Timeout=200;
				
				  //Indicamos cual es la direccin de destino del correo
				  $mail->AddAddress("jmapando@gmail.com");
				
				  //Asignamos asunto y cuerpo del mensaje
				  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
				  //que se vea en negrita
				  $mail->Subject = "Nuevo evento";
				  $mail->Body = $mensaje;
				
				  //Definimos AltBody por si el destinatario del correo no admite email con formato html 
				  $mail->AltBody = "";
			
			  //se envia el mensaje, si no ha habido problemas 
			  //la variable $exito tendra el valor true
			  $exito = $mail->Send();
			
			  //Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
			  //para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
			  //del anterior, para ello se usa la funcion sleep	
				  $intentos=1; 
				  while ((!$exito) && ($intentos < 5)) {
					sleep(5);
						//echo $mail->ErrorInfo;
						$exito = $mail->Send();
						$intentos=$intentos+1;	
					
				   }
			  
			  			
?>
