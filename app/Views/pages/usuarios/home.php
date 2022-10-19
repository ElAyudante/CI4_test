<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Bienvenid@ 
					<?php $value = $this->session->userdata('user');
					echo $value['Nombre']?></h1>
            </div>
        </div>
    </div>
</section>

<section class="app">
	<div class="container-fluid">
		<div class="col-lg-2 ps-0">
		<?php echo view('templates/menu_usuarios'); ?> 
		</div>
		<div class="row">
			<div class="col-md-3">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <input type="text" class="form-control" name="falta" value="<?php echo $value['FechaAlta']?>" autofocus>          
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control" name="nombre" value="<?php echo $value['Nombre']?>" autofocus>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="apellidos" value="<?php echo $value['Apellidos']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="usuario" value="<?php echo $value['NIF']?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="password" class="form-control bg-transparent" name="pass" value="<?php echo $value['Pass']?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="password" class="form-control bg-transparent" name="confirm_pass">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="nif" value="<?php echo $value['NIF']?>">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="email" value="<?php echo $value['Email']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="direccion" value="<?php echo $value['Direccion']?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="text" class="form-control bg-transparent" name="localidad" value="<?php echo $value['Localidad']?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="cp" value="<?php echo $value['CP']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <select id="provincia" class="form-control bg-transparent" name="provincia">
                  <option selected value="<?php echo $value['Provincia']?>"></option>
                  <?php 
                    
                    ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <select id="comunidad" class="form-control bg-transparent" name="comunidad">
                  <option selected value="<?php echo $value['Comunidad']?>"></option>
                  <?php 
                    
                    ?>
                </select>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="telefono" value="<?php echo $value['Telefono']?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="number" class="form-control bg-transparent" name="movil" value="<?php echo $value['Movil']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <select id="lnacimiento" class="form-control bg-transparent" value="<?php echo $value['LugarNacimiento']?>">
                </select>
              </div>
              <div class="col-md-3">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <input type="text" class="form-control" name="nombre" value="<?php echo $value['CP']?>" autofocus>          
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="cuenta" value="<?php echo $value['CuentaBancaria']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="tlftrabajo" value="<?php echo $value['TelefonoTrabajo']?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="lugtrabajo" value="<?php echo $value['LugarTrabajo']?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="dtrabajo" value="<?php echo $value['DireccionTrabajo']?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="loctrabajo" value="<?php echo $value['LocalidadTrabajo']?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <input type="number" class="form-control text-uppercase bg-transparent" name="ncolegiado" value="<?php echo $value['NumColegiado']?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <input type="text" class="form-control" name="fechanacimiento" value="<?php echo $value['FechaNacimiento']?>" autofocus>           
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select id ="ejerciente" class="form-control bg-transparent" name="ejerciente">
                    <option value="" select><?php
						switch($value['Ejerciente']){
							case 0:
								echo "No Ejerciente";
								break;
							case 1:
								echo "Ejerciente";
								break;
							case 2:
								echo "Jubilado";
								break;
							case 3:
								echo "Estudiante";
								break;
						}
					?></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="titulacion" value="<?php echo $value['Titulacion']?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="especialidad" value="<?php echo $value['Especialidad']?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control text-uppercase bg-transparent" name="ambito" value="<?php echo $value['AmbitoTrabajo']?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-checkbox text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Sector</label>
                  <input type="hidden" class="custom-control-input" name="publico" value="0">
                  <input type="checkbox" class="custom-control-input" name="sector" value="publico" id="sector1">
                  <label class="custom-control-label" for="sector1" style="color: #004987; font-weight:500;">Público</label>
                  <input type="hidden" class="custom-control-input" name="sector" value="privado" id="sector2">
                  <input type="checkbox" class="custom-control-input" name="privado" value="1" id="sector2">
                  <label class="custom-control-label" for="sector2" style="color: #004987; font-weight:500;">Privado</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Solicita habilitación</label>
                  <input type="radio" class="custom-control-input" value="0" name="habitacion" id="habitacion1">
                  <label class="custom-control-label" for="habitacion1" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" value="1" name="habitacion" id="habitacion2">
                  <label class="custom-control-label" for="habitacion2"style="color: #004987; font-weight:500;">No</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Logopeda diplomado</label>
                  <input type="radio" class="custom-control-input" value="0" name="diplomado" id="diplomado1">
                  <label class="custom-control-label" for="diplomado1" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" value="1" name="diplomado" id="diplomado2">
                  <label class="custom-control-label" for="diplomado2" style="color: #004987; font-weight:500;">No</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                  <label style="color: #004987; font-weight:500;">Bolsa de trabajo</label>
                  <input type="radio" class="custom-control-input" value="0" name="bolsa" id="bolsa1">
                  <label class="custom-control-label" for="bolsa1" style="color: #004987; font-weight:500;">Sí</label>
                  <input type="radio" class="custom-control-input" value="1" name="bolsa" id="bolsa2">
                  <label class="custom-control-label" for="bolsa2" style="color: #004987; font-weight:500;">No</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group custom-checkbox text-uppercase pt-3">
                  <input type="hidden" class="custom-control-input" value="0" name="traslado" id="traslado">
                  <input type="checkbox" class="custom-control-input" value="1" name="traslado" id="traslado">
                  <label class="custom-control-label" for="sector" style="color: #004987; font-weight:500;">Traslado</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
              </div>
            </div>
		</div>
	</div>
</section>