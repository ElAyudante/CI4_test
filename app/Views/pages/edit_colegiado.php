

</div>

<section class="presentacion p-5 text-left">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Editar colegiado</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: 2700;">

  <?php echo view('templates/menu_admin'); ?>

	<div class="container" style="width: 70%; padding:0; margin-right:2em; margin-top: -185em;">
		<?php  ?>

		<?php echo form_open('itemCRUD/update/'.$item->Id); ?>
			<div class="row">

			<?php if (validation_errors()) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (isset($error)) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				</div>
			<?php endif; ?>
            <?php if (isset($success)) : ?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert">
						<?= $success ?>
					</div>
				</div>
			<?php endif; ?>

			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Editar Colegiado</h3>

			<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha Alta:</strong>
                    <input type="text" name="falta" class="form-control" value="<?php echo $item->FechaAlta; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $item->Nombre; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="apellidos" class="form-control" value="<?php echo $item->Apellidos; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nif:</strong>
                    <input type="text" name="nif" class="form-control" value="<?php echo $item->NIF; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dirección:</strong>
                    <input type="text" name="direccion" class="form-control" value="<?php echo $item->Direccion; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Localidad:</strong>
                    <input type="text" name="title" class="form-control" value="<?php echo $item->Localidad; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Código Postal:</strong>
                    <input type="text" name="localidad" class="form-control" value="<?php echo $item->CP; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Provincia:</strong>
                    <input type="text" name="provincia" class="form-control" value="<?php echo $item->Provincia; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comunidad:</strong>
                    <input type="text" name="comunidad" class="form-control" value="<?php echo $item->Comunidad; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teléfono:</strong>
                    <input type="text" name="telefono" class="form-control" value="<?php echo $item->Telefono; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Móvil:</strong>
                    <input type="text" name="movil" class="form-control" value="<?php echo $item->Movil; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" value="<?php echo $item->Email; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lugar de Nacimiento:</strong>
                    <input type="text" name="lnacimiento" class="form-control" value="<?php echo $item->LugarNacimiento; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de Nacimiento:</strong>
                    <input type="text" name="fnacimiento" class="form-control" value="<?php echo $item->FechaNacimiento; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cuenta Bancaria:</strong>
                    <input type="text" name="cuenta" class="form-control" value="<?php echo $item->CuentaBancaria; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teléfono de trabajo:</strong>
                    <input type="text" name="tlftrabajo" class="form-control" value="<?php echo $item->TelefonoTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lugar de Trabajo:</strong>
                    <input type="text" name="lugtrabajo" class="form-control" value="<?php echo $item->LugarTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dirección de Trabajo:</strong>
                    <input type="text" name="dtrabajo" class="form-control" value="<?php echo $item->DireccionTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Localidad de Trabajo:</strong>
                    <input type="text" name="loctrabajo" class="form-control" value="<?php echo $item->LocalidadTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nº de Colegiado:</strong>
                    <input type="text" name="colegiado" class="form-control" value="<?php echo $item->Colegiado; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ejerciente:</strong>
                    <input type="text" name="ejerciente" class="form-control" value="<?php echo $item->Ejerciente; ?>">
                </div>
            </div><div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Especialidad:</strong>
                    <input type="text" name="especialidad" class="form-control" value="<?php echo $item->Especialidad; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ámbito de Trabajo:</strong>
                    <input type="text" name="ambito" class="form-control" value="<?php echo $item->AmbitoTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sector de Trabajo:</strong>
                    <input type="text" name="sector" class="form-control" value="<?php echo $item->Sector; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Solicita Habilitación:</strong>
                    <input type="text" name="habitacion" class="form-control" value="<?php echo $item->SolicitaHabilitacion; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diplomado en Logopedia:</strong>
                    <input type="text" name="diplomado" class="form-control" value="<?php echo $item->DiplomaturaLogopedia; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titulación:</strong>
                    <input type="text" name="titulacion" class="form-control" value="<?php echo $item->Titulacion; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Otras Titulaciones:</strong>
                    <input type="text" name="otros" class="form-control" value="<?php echo $item->OtrosTitulos; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bolsa de Trabajo:</strong>
                    <input type="text" name="bolsa" class="form-control" value="<?php echo $item->AltaBolsaTrabajo; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Otros Casos:</strong>
                    <input type="text" name="otros" class="form-control" value="<?php echo $item->OtroCaso; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Traslado:</strong>
                    <input type="text" name="traslado" class="form-control" value="<?php echo $item->Trasladado; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Colegio de Origen:</strong>
                    <input type="text" name="colegioorigen" class="form-control" value="<?php echo $item->ColegioOrigen; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nº Colegiado de Origen:</strong>
                    <input type="text" name="ncolegiado" class="form-control" value="<?php echo $item->NumColegiado; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Observaciones:</strong>
                    <input type="text" name="observacion" class="form-control" value="<?php echo $item->Observaciones; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Publicidad:</strong>
                    <input type="text" name="publicidad" class="form-control" value="<?php echo $item->Publicidad; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Colegiado Actualmente:</strong>
                    <input type="text" name="colegiadoactual" class="form-control" value="<?php echo $item->Activo; ?>">
                </div>
            </div>
			<div class="row">
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
				</div>
			</div>

		<?php echo form_close(); ?>
	</div>
</section>
<script type="text/javascript">
$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '< Ant ',
 nextText: ' Sig >',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function() {
    $("#fnacimiento").datepicker(
      {
        dateFormat: 'dd-mm-yy'
    }
    );
    $("#fexpiracion").datepicker(
      {
        dateFormat: 'dd-mm-yy'
    }
    );
    $("#falta").datepicker(
      {
        dateFormat: 'dd-mm-yy'
    }
    );
});
</script>
