</div>
<?php  ?>

<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Crear nuevo foro</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta" style="margin-bottom: -3em; padding-bottom: 4em;">
	<div class="container">
		<div class="row">
			<?php if ($login_as_admin_needed) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<p>Necesitas ser administrador para crear un nuevo foro</p>
						<p>Por favor, <a href="<?= base_url('login') ?>">inicia sesión.</a>.</p>
					</div>
				</div>
			<?php else : ?>
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
				<div class="col-md-12">
					<?= form_open() ?>
						<div class="form-group">
							<label class="respuesta" for="title">Título</label>
							<input type="text" class="form-control" id="title" name="title" placeholder="Introduce el nombre de tu foro" value="<?= $title ?>">
						</div>
						<div class="form-group">
							<label class="respuesta" for="description">Descripción </label>
							<textarea rows="6" class="form-control" id="description" name="description" placeholder="Introduce una breve descripción sobre el foro(80 caractéres máximo)"><?= $description ?></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary text-uppercase mt-4" value="Crear foro">
						</div>
					</form>
				</div>
			<?php endif; ?>
		</div><!-- .row -->
	</div>
</section>
