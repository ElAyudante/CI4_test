<?php $value = $_SESSION['user'];

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
          <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Mis Datos Personales</h3>
          <?php echo form_open('users/update_datos/'.$value['Id']); ?>
          <div class="form-border p-3 bg-white mb-0">
            <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
              <div class="col">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <input type="text" class="form-control bg-gray" name="falta" value="<?php echo $value['FechaAlta']?>" autofocus readonly>          
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-gray" name="colegiado" value="<?php echo $value['Colegiado']?>" autofocus readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-gray" name="nombre" value="<?php echo $value['Nombre']?>" autofocus readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-gray" name="apellidos" value="<?php echo $value['Apellidos']?>" readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-gray" name="usuario" value="<?php echo $value['NIF']?>" readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="password" class="form-control" name="pass" value="<?php echo $value['Pass']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="password" class="form-control" name="confirm_pass" placeholder="Confirmar Contraseña">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control bg-gray" name="nif" value="<?php echo $value['NIF']?>" readonly>
                </div>
              </div>

              <div class="col-md-8">
                <div class="form-group">
                  <input type="text" class="form-control" name="email" value="<?php echo $value['Email']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="direccion" value="<?php echo $value['Direccion']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="localidad" value="<?php echo $value['Localidad']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control" name="cp" value="<?php echo $value['CP']?>">
                </div>
              </div>

              <div class="form-group col">
                <select id="provincia" class="form-select " name="provincia">
                  <option selected value="<?php echo $value['Provincia']?>"><?php echo $value['Provincia']?></option>
                  <?php 
                    foreach ($sel_provincias as $sel_prov => $abreviatura) {
                      echo '<option value="' . $sel_prov . '">' . $abreviatura .'</option>';
                    }
                    ?>
                </select>
              </div>

              <div class="form-group col">
                <select id="comunidad" class="form-select " name="comunidad">
                  <option selected value="<?php echo $value['Comunidad']?>"><?php echo $value['Comunidad']?></option>
                  <?php 
                    foreach ($sel_comunidades as $sel_com => $siglas) {
                      echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                    }
                    ?>
                </select>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control" name="telefono" value="<?php echo $value['Telefono']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control" name="movil" value="<?php echo $value['Movil']?>">
                </div>
              </div>

              <div class="form-group col">
                <input class="form-control bg-gray" value="<?php echo $value['LugarNacimiento']?>" readonly>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control" name="cuenta" value="<?php echo $value['CuentaBancaria']?>" placeholder="Cuenta Bancaria">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control" name="tlftrabajo" value="<?php echo $value['TelefonoTrabajo']?>" placeholder="Teléfono Trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="lugtrabajo" value="<?php echo $value['LugarTrabajo']?>" placeholder="Lugar Trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="dtrabajo" value="<?php echo $value['DireccionTrabajo']?>" placeholder="Dirección Trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="loctrabajo" value="<?php echo $value['LocalidadTrabajo']?>" placeholder="Localidad Trabajo">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="number" class="form-control bg-gray" name="ncolegiado" value="<?php echo $value['NumColegiado']?>" readonly>
                </div>
              </div>

              <div class="col">
                <div class="form-group" style="display:flex;">
                  <i class="fas fa-calendar icon" tabindex=0 style="padding: 10px; background: #004987; color: white; min-width: 50px; text-align: center; border-radius:5px; margin-right: -5px;"></i>
                  <input type="text" class="form-control bg-gray" name="fechanacimiento" value="<?php echo $value['FechaNacimiento']?>" autofocus readonly>           
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <select id ="ejerciente" class="form-select bg-gray" name="ejerciente" readonly>
                    <option value="">
                      <?php
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
                      ?>
                    </option>
                  </select>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="titulacion" value="<?php echo $value['Titulacion']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="especialidad" value="<?php echo $value['Especialidad']?>">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <input type="text" class="form-control" name="ambito" value="<?php echo $value['AmbitoTrabajo']?>">
                </div>
              </div>

              <div class="col">
                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
              </div>

            </div>
          </div>

        </div>
      </div>

		</div>
	</div>
</section>