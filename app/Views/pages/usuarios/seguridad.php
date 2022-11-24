<? 
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if (!$_SESSION['valido'] || $_SESSION['valido']=="false") { 
    //si no existe, envio a la p�gina de autentificacion 
    header("Location: index.php"); 
    //ademas salgo de este script 
    exit(); 
}
?> 

<section class="bg-gray">
	<div class="container-fluid">
		<div class="row h-auto">

      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_usuarios'); ?> 
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
          <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Restablecer Contraseña</h3>

          <?php echo form_open('users/update_datos/'.$value['Id']); ?>
          <div class="form-border p-3 bg-white mb-0">
            
            <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
              <div class="col">
                <div class="form-group">
                  <strong>Password:</strong>
                  <div class="d-flex">
                    <input id="password" type="password" class="form-control" name="pass" value="<?php echo $value['Pass']?>">
                    <span class="input-group-text" onclick="password_show_hide();">
                      <i class="fas fa-eye" id="show_eye"></i>
                      <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Confirmar Password:</strong>
                  <div class="d-flex">
                    <input id="confirm_password" type="password" class="form-control" name="confirm_pass" placeholder="Confirmar Contraseña">
                    <span class="input-group-text" onclick="password_show_hide_confirm();">
                      <i class="fas fa-eye" id="show_eye_confirm"></i>
                      <i class="fas fa-eye-slash d-none" id="hide_eye_confirm"></i>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
              </div>

            </div>
          </div>

        </div>
      </div>

		</div>
	</div>
</section>