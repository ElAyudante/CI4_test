<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
?>

<section class="bg-gray">

	<div class="container-fluid">
		<div class="row">
            
            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
            </div>

            <div class="col-lg-10">
                <div class="container p-5">
                    <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Editar Colegiado</h3>                
                    <?php echo form_open('itemCRUD/update/'.$item->Id, $form_att); ?>

                <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
                    <div class="col">
                        <div class="form-group">
                            <strong>Fecha de Alta:</strong>
                            <input type="date" name="falta" class="form-control" value="<?php echo $item->FechaAlta; ?>" >
                            <input type="hidden" name="Id" class="form-control" value="<?php echo $item->Id; ?>" >
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Nº de Colegiado:</strong>
                            <input type="text" name="ncolegiado" class="form-control" value="<?php echo $item->Colegiado; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $item->Nombre; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            <input type="text" name="apellidos" class="form-control" value="<?php echo $item->Apellidos; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>DNI:</strong>
                            <input type="text" name="nif" class="form-control" value="<?php echo $item->NIF; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" name="email" class="form-control" value="<?php echo $item->Email; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                        <strong>Usuario:</strong>
                        <input type="text" class="form-control" name="usuario" value="<?php echo $item->Usuario?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                        <strong>Password:</strong>
                        <div class="d-flex">
                            <input id="password" type="password" class="form-control" name="pass" value="<?php echo $item->Pass?>">
                            <span class="input-group-text" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Teléfono:</strong>
                            <input type="text" name="telefono" class="form-control" value="<?php echo $item->Telefono; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Lugar de Nacimiento:</strong>
                            <input type="text" name="lnacimiento" class="form-control" value="<?php echo $item->LugarNacimiento; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Fecha de Nacimiento:</strong>
                            <input type="text" name="fnacimiento" class="form-control" value="<?php echo $item->FechaNacimiento; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            <input type="text" name="direccion" class="form-control" value="<?php echo $item->Direccion; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Código Postal:</strong>
                            <input type="text" name="cp" class="form-control" value="<?php echo $item->CP; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Localidad:</strong>
                            <input type="text" name="localidad" class="form-control" value="<?php echo $item->Localidad; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Provincia:</strong>
                            <input type="text" name="provincia" class="form-control" value="<?php echo $item->Provincia; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Comunidad Autónoma:</strong>
                            <input type="text" name="comunidad" class="form-control" value="<?php echo $item->Comunidad; ?>">
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-group">
                            <strong>Cuenta Bancaria:</strong>
                            <input type="text" name="cuenta" class="form-control" value="<?php echo $item->CuentaBancaria; ?>" disabled>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="form-group">
                            <strong>Teléfono de trabajo:</strong>
                            <input type="text" name="tlftrabajo" class="form-control" value="<?php echo $item->TelefonoTrabajo; ?>">
                        </div>
                    </div>                    

                    <div class="col">
                        <div class="form-group">
                            <strong>Lugar de Trabajo:</strong>
                            <input type="text" name="lugtrabajo" class="form-control" value="<?php echo $item->LugarTrabajo; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Dirección de Trabajo:</strong>
                            <input type="text" name="dtrabajo" class="form-control" value="<?php echo $item->DireccionTrabajo; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Localidad de Trabajo:</strong>
                            <input type="text" name="loctrabajo" class="form-control" value="<?php echo $item->LocalidadTrabajo; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Especialidad:</strong>
                            <input type="text" name="especialidad" class="form-control" value="<?php echo $item->Especialidad; ?>">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Ámbito de Trabajo:</strong>
                            <input type="text" name="ambito" class="form-control" value="<?php echo $item->AmbitoTrabajo; ?>">
                        </div>
                    </div>

                    <div class="col" id='colegioOrigen'>
                        <div class="form-group">
                        <strong>Colegio de Origen</strong>
                        <input type="text" class="form-control text-uppercase bg-transparent" name="colegioorigen" value="<?php echo $item->ColegioOrigen; ?>" placeholder="Colegio de origen" >
                        </div>
                    </div>

                    <div class="col" id="numOrigen">
                        <div class="form-group">
                        <strong>Nº Colegiado de Origen</strong>
                        <input type="number" class="form-control text-uppercase bg-transparent" name="norigen" value="<?php echo $item->NumColegiado; ?>" placeholder="Nº Colegiado de origen" >
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Categoría:</strong>
                            <select type="text" name="ejerciente" class="form-select" value="<?php 
                                switch ($item->Ejerciente) {
                                    case '0':
                                        echo('No ejerciente');
                                        break;
                                    case '1':
                                        echo('Ejerciente');
                                        break;
                                    case '2':
                                        echo('Jubilado');
                                        break;
                                    case '3':
                                        echo('Estudiante');
                                        break;                            
                                    default:
                                        echo('Tipo de colegiado');
                                        break;
                                }
                            ?>" >
                                <option disabled selected hidden value="<?php 
                                switch ($item->Ejerciente) {
                                    case '0':
                                        echo('No ejerciente');
                                        break;
                                    case '1':
                                        echo('Ejerciente');
                                        break;
                                    case '2':
                                        echo('Jubilado');
                                        break;
                                    case '3':
                                        echo('Estudiante');
                                        break;                            
                                    default:
                                        echo('Tipo de colegiado');
                                        break;
                                }?>"><?php 
                                switch ($item->Ejerciente) {
                                    case '0':
                                        echo('No ejerciente');
                                        break;
                                    case '1':
                                        echo('Ejerciente');
                                        break;
                                    case '2':
                                        echo('Jubilado');
                                        break;
                                    case '3':
                                        echo('Estudiante');
                                        break;                            
                                    default:
                                        echo('Tipo de colegiado');
                                        break;
                                }?></option>
                                <option value="1">Ejerciente</option>
                                <option value="0">No ejerciente</option>
                                <option value="2">Jubilado</option>
                                <option value="3">Estudiante</option>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                        <strong>Sector:</strong>
                            <select id ="sectores" class="form-select bg-transparent" name="sectores">
                                <option value="1" select>Público</option>
                                <option value="0">Privado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <strong>Observaciones:</strong>
                        <textarea name="observaciones" id="observaciones" class="form-select bg-transparent"><?php echo $item->Observaciones ?></textarea>
                    </div>
                    
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
                    </div>
		        <?php echo form_close(); ?>

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
</script>
