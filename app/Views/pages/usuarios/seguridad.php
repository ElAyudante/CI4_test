<section class="bg-gray">
	<div class="container-fluid">
		<div class="row h-auto">

      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_usuarios'); ?> 
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
          <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Cambiar Contraseña</h3>

          <?php echo form_open('users/request_password_submit'); ?>
          <div class="form-border p-3 bg-white mb-0">
            
            <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
              <div class="col">
                <div class="form-group">
                  <strong>Contraseña Actual:</strong>
                  <div class="d-flex">
                    <input id="password1" type="password" class="form-control" name="pass" placeholder="Contraseña Actual">
                    <span class="input-group-text" onclick="password_show_hide1();">
                      <i class="fas fa-eye" id="show_eye1"></i>
                      <i class="fas fa-eye-slash d-none" id="hide_eye1"></i>
                    </span>
                  </div>
                </div>
              </div>
            
              <div class="col">
                <div class="form-group">
                  <strong>Nueva Contraseña:</strong>
                  <div class="d-flex">
                    <input id="password2" type="password" class="form-control" name="pass" placeholder="Nueva Contraseña">
                    <span class="input-group-text" onclick="password_show_hide2();">
                      <i class="fas fa-eye" id="show_eye2"></i>
                      <i class="fas fa-eye-slash d-none" id="hide_eye2"></i>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Confirmar Contraseña:</strong>
                  <div class="d-flex">
                    <input id="password3" type="password" class="form-control" name="confirm_pass" placeholder="Confirmar Contraseña">
                    <span class="input-group-text" onclick="password_show_hide3();">
                      <i class="fas fa-eye" id="show_eye3"></i>
                      <i class="fas fa-eye-slash d-none" id="hide_eye3"></i>
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