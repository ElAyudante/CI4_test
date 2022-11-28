<?php 
$session = \Config\Services::session();
$value = $_SESSION['user'];

$sel_provincias = array (
  'Alava' => 'Alava',
  'Albaceta' => 'Albacete',
  'Alicante' => 'Alicante',
  'Almeria' => 'Almería',
  'Asturis' => 'Asturias',
  'Avila' => 'Ávila',
  'Badajoz' => 'Badajoz',
  'Baleares' => 'Baleares',
  'Barcelona' => 'Barcelona',
  'Burgos' => 'Burgos',
  'Caceres' => 'Cáceres',
  'Cadiz' => 'Cádiz',
  'Canarias' => 'Canarias',
  'Cantabria' => 'Cantabria',
  'Castellon' => 'Castellón',
  'Ciudad Real' => 'Ciudad Real',
  'Cordoba' => 'Córdoba',
  'Coruña' => 'Coruña',
  'Cuenca' => 'Cuenca',
  'Girona' => 'Girona',
  'Granada' => 'Granada',
  'Guadalajara' => 'Guadalajara',
  'Guipúzcoa' => 'Guipúzcoa',
  'Huelva' => 'Huelva',
  'Huesca' => 'Huesca',
  'Jaen' => 'Jaén',
  'Leon' => 'León',
  'Lleida' => 'Lleida',
  'Lugo' => 'Lugo',
  'Madrid' => 'Madrid',
  'Malaga' => 'Málaga',
  'Murcia' => 'Murcia',
  'Navarra' => 'Navarra',
  'Ourense' => 'Ourense',
  'Palencia' => 'Palencia',
  'Pontevedra' => 'Pontevedra',
  'La Rioja' => 'La Rioja',
  'Salamanca' => 'Salamanca',
  'Segovia' => 'Segovia',
  'Sevilla' => 'Sevilla',
  'Soria' => 'Soria',
  'Tarragona' => 'Tarragona',
  'Teruel' => 'Teruel',
  'Toledo' => 'Toledo',
  'Valencia' => 'Valencia',
  'Valladolid' => 'Valladolid',
  'Vizcaya' => 'Vizcaya',
  'Zamora' => 'Zamora',
  'Zaragoza' => 'Zaragoza'
);

$sel_comunidades =  array (
  'Anadalucia' => 'Andalucia',
  'Aragon' => 'Aragón',
  'Asturias' => 'Asturias',
  'Baleares' => 'Baleares',
  'Canarias' => 'Canarias',
  'Cantabria' => 'Cantabria',
  'Castilla La Mancha' => 'Castilla La Mancha',
  'Castilla Leon' => 'Catilla León',
  'Cataluña' => 'Cataluña',
  'Ceuta' => 'Ceuta',
  'Comunidad Valenciana' => 'Comunidad Valenciana',
  'Extremadura' => 'Extremadura',
  'Galicia' => 'Galicia',
  'La Rioja' => 'La Rioja',
  'Madrid' => 'Madrid',
  'Melilla' => 'Melilla',
  'Navarra' => 'Navarra',
  'Pais Vasco' => 'País Vasco',
  'Murcia' => 'Región de Murcia'
)
?>

<section class="bg-gray">
	<div class="container-fluid">
		<div class="row h-auto">

      <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_usuarios'); ?> 
      </div>

      <div class="col-lg-10">
        <div class="container p-5">
        <?php if($session->getFlashdata('error') !== null){ 
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $session->getFlashdata('error');  ?>
            </div>

        <?php }?>
        <?php if($session->getFlashdata('cambio') !== null){ 
        ?>
            <div class="alert alert-success" role="success">
                <?php echo $session->getFlashdata('cambio');  ?>
            </div>

        <?php }?>
          <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Mis Datos Personales</h3>
          <?php echo form_open('users/update_datos/'.$value['Id']); ?>
          <div class="form-border p-3 bg-white mb-0">
            <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
              <div class="col">
                <div class="form-group">
                  <strong>Fecha de Alta:</strong>
                  <div class="d-flex">
                    <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                    <input type="text" class="form-control bg-gray" name="falta" value="<?php echo $data['FechaAlta']?>" autofocus readonly>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Nº Colegiado:</strong>
                  <input type="text" class="form-control bg-gray" name="ncolegiado" value="<?php echo $data['Colegiado']?>" autofocus readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Nombre:</strong>
                  <input type="text" class="form-control bg-gray" name="nombre" value="<?php echo $data['Nombre']?>" autofocus readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Apellidos:</strong>
                  <input type="text" class="form-control bg-gray" name="apellidos" value="<?php echo $data['Apellidos']?>" readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Usuario:</strong>
                  <input type="text" class="form-control bg-gray" name="usuario" value="<?php echo $data['NIF']?>" readonly>
                </div>
              </div>

              <!--<div class="col">
                <div class="form-group">
                  <strong>Password:</strong>
                  <div class="d-flex">
                    <input id="password" type="password" class="form-control" name="pass" value="<?php echo $data['Pass']?>">
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
              </div>-->

              <div class="col">
                <div class="form-group">
                  <strong>DNI:</strong>
                  <input type="text" class="form-control bg-gray" name="nif" value="<?php echo $data['NIF']?>" readonly>
                </div>
              </div>

              <div class="col-md-8">
                <div class="form-group">
                  <strong>EMAIL:</strong>
                  <input type="text" class="form-control" name="email" value="<?php echo $data['Email']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Dirección:</strong>
                  <input type="text" class="form-control" name="direccion" value="<?php echo $data['Direccion']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Localidad:</strong>
                  <input type="text" class="form-control" name="localidad" value="<?php echo $data['Localidad']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Código Postal:</strong>
                  <input type="number" class="form-control" name="cp" value="<?php echo $data['CP']?>">
                </div>
              </div>

              <div class="form-group col">
                <strong>Provincia:</strong>
                <select id="provincia" class="form-select " name="provincia">
                  <option selected value="<?php echo $data['Provincia']?>"><?php echo $data['Provincia']?></option>
                  <?php 
                    foreach ($sel_provincias as $sel_prov => $abreviatura) {
                      echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
                    }
                    ?>
                </select>
              </div>

              <div class="form-group col">
                <strong>Comunidad Autónoma:</strong>
                <select id="comunidad" class="form-select " name="comunidad">
                  <option selected value="<?php echo $data['Comunidad']?>"><?php echo $data['Comunidad']?></option>
                  <?php 
                    foreach ($sel_comunidades as $sel_com => $siglas) {
                      echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                    }
                    ?>
                </select>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Teléfono:</strong>
                  <input type="number" class="form-control" name="telefono" value="<?php echo $data['Telefono']?>">
                </div>
              </div>

              <div class="form-group col">
                <strong>Lugar de Nacimiento:</strong>
                <input class="form-control bg-gray" value="<?php echo $data['LugarNacimiento']?>" name="lnacimiento" readonly>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Cuenta Bancaria:</strong>
                  <input type="number" class="form-control" name="cuenta" value="<?php echo $data['CuentaBancaria']?>" placeholder="Cuenta Bancaria">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Teléfono de Trabajo:</strong>
                  <input type="number" class="form-control" name="tlftrabajo" value="<?php echo $data['TelefonoTrabajo']?>" placeholder="Teléfono Trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Lugar de Trabajo:</strong>
                  <input type="text" class="form-control" name="lugtrabajo" value="<?php echo $data['LugarTrabajo']?>" placeholder="Lugar Trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Dirección de Trabajo:</strong>
                  <input type="text" class="form-control" name="dtrabajo" value="<?php echo $data['DireccionTrabajo']?>" placeholder="Dirección Trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Localidad de Trabajo:</strong>
                  <input type="text" class="form-control" name="loctrabajo" value="<?php echo $data['LocalidadTrabajo']?>" placeholder="Localidad Trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Nº Colegiado de Origen:</strong>
                  <input type="number" class="form-control bg-gray" name="norigen" value="<?php echo $data['NumColegiado']?>" readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Fecha de Nacimiento:</strong>
                  <div class="d-flex">
                    <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                    <input type="text" class="form-control bg-gray" name="fnacimiento" value="<?php echo $data['FechaNacimiento']?>" autofocus readonly>
                  </div>      
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Categoría:</strong>
                  <select id ="ejerciente" class="form-select bg-gray" name="ejerciente" readonly>
                    <option value="">
                      <?php
                        switch($data['Ejerciente']){
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
                      ?>
                    </option>
                  </select>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Titulación:</strong>
                  <input type="text" class="form-control" name="titulacion" value="<?php echo $data['Titulacion']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Especialidad:</strong>
                  <input type="text" class="form-control" name="especialidad" value="<?php echo $data['Especialidad']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <strong>Ámbito de Trabajo:</strong>
                  <input type="text" class="form-control" name="ambito" value="<?php echo $data['AmbitoTrabajo']?>">
                </div>
              </div>

              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
                <input type="hidden" value="<?php echo $data['Id'] ?>">
              </div>

            </div>
          </div>

        </div>
      </div>

		</div>
	</div>
</section>

<script>
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}

function password_show_hide_confirm() {
  var x = document.getElementById("confirm_password");
  var show_eye = document.getElementById("show_eye_confirm");
  var hide_eye = document.getElementById("hide_eye_confirm");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>