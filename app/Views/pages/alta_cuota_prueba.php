</div>

<section class="presentacion p-5 text-left">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Alta Cuota</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: auto;">

	<?php echo view('templates/menu_admin'); ?>

  	<div class="container" style="width: 70%; padding:0; margin-right:2em; margin-top: -60em;">
		<?php  ?>

		<?php echo form_open('users/register_cuota'); ?>
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
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta cuota</h3>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="number" class="form-control" name="anio" placeholder="Año" autofocus>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="descripcion" placeholder="Cuota">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-5">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
                </div>
            </div>
        <?php echo form_close(); ?>
	</div>
</section>


