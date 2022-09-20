<? 
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if (!$_SESSION['valido'] || $_SESSION['valido']=="false") { 
    //si no existe, envio a la p�gina de autentificacion 
    header("Location: index.php"); 
    //ademas salgo de este script 
    exit(); 
}
?> 
